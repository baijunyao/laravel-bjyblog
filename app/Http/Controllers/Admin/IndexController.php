<?php

namespace App\Http\Controllers\Admin;

use HyperDown\Parser;
use Parsedown;
use App\Models\Chat;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\OauthUser;
use DB;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\HTMLToMarkdown\HtmlConverter;

class IndexController extends Controller
{
    /**
     * 后台首页
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin/index/index');
    }


    public function migration(Article $articleModel, ArticleTag $articleTag, Comment $commentModel, FriendshipLink $friendshipLinkModel, Config $configModel, OauthUser $oauthUserModel, Chat $chatModel)
    {
        // 从旧系统中迁移文章
        $htmlConverter = new HtmlConverter();
        $parser = new Parser();
        $data = DB::connection('old')->table('article')->get()->toArray();
        $articleModel->truncate();
        foreach ($data as $k => $v) {
            $content = htmlspecialchars_decode($v->content);
            $content = str_replace('<br style="box-sizing: inherit; margin-bottom: 0px;"/>', '', $content);
            $content = str_replace('/Upload/image/ueditor', '/uploads/article', $content);
            $content = str_replace(['<pre class="brush:', '</pre>', ';toolbar:false">',  '<p><br/></p>'], ["\r\n```", "\r\n```\r\n", "\r\n", "\r\n"], $content);
            $content = str_replace('```js', '```javascript', $content);
            $content = str_replace("\r\n", '|rn|', $content);
            $content = str_replace('<p>', '', $content);
            $content = str_replace('</p>', '|rn|', $content);
            $content = str_replace('&nbsp;', '|nbsp|', $content);
            $markdown = $htmlConverter->convert($content);
            $markdown = htmlspecialchars($markdown);
            $markdown = str_replace(['|rn|', '\*', '\_', "\n "], ["\r\n", '*', '_', "\n    "], $markdown);
            $markdown = str_replace("\r\n\r\n", "\r\n", $markdown);
            $markdown = str_replace('http://www.baijunyao.com/uploads/article', 'uploads/article', $markdown);
            $markdown = str_replace('|nbsp|', '&nbsp;', $markdown);
            $markdown = html_entity_decode($markdown);

            // markdown 转html
            $html = $parser->makeHtml($markdown);
            $html = html_entity_decode($html);
            $html = str_replace('<code class="', '<code class="lang-', $html);
            $article = [
                'id' => $v->aid,
                'category_id' => $v->cid,
                'title' => $v->title,
                'author' => $v->author,
                'markdown' => $markdown,
                'html' => $html,
                'description' => $v->description,
                'keywords' => $v->keywords,
                'cover' => $articleModel->getCover($markdown),
                'is_top' => $v->is_top,
                'click' => $v->click,
            ];
            $articleModel->create($article);
            $editArticleMap = [
                'id' => $v->aid
            ];

            $editArticleData = [
                'created_at' => date('Y-m-d H:i:s', $v->addtime)
            ];
            $articleModel->editData($editArticleMap, $editArticleData);
        }

        // 从旧系统中迁移文章标签中间表
        // $data = DB::connection('old')->table('article_tag')->get()->toArray();
        // $articleTag->truncate();
        // foreach ($data as $v) {
        //     $article_tag = [
        //         'article_id' => $v->aid,
        //         'tag_id' => $v->tid
        //     ];
        //     $articleTag->addData($article_tag);
        // }

        // 从旧系统中迁移评论
        // $data = DB::connection('old')->table('comment')->get()->toArray();
        // $commentModel->truncate();
        // foreach ($data as $v) {
        //     $comment_data = [
        //         'id' => $v->cmtid,
        //         'oauth_user_id' => $v->ouid,
        //         'type' => $v->type,
        //         'pid' => $v->pid,
        //         'article_id' => $v->aid,
        //         'content' => str_replace('/Public/emote', '/statics/emoticon', $v->content),
        //         'status' => $v->status,
        //     ];
        //     $commentModel->create($comment_data);
        //     $editCommentMap = [
        //         'id' => $v->cmtid,
        //     ];
        //     $editCommentData = [
        //         'created_at' => date('Y-m-d H:i:s', $v->date)
        //     ];
        //     $commentModel->editData($editCommentMap, $editCommentData);
        // }

        // 迁移友情链接
        // $data = DB::connection('old')->table('link')->get()->toArray();
        // $friendshipLinkModel->truncate();
        // foreach ($data as $v) {
        //     $link_data = [
        //         'id' => $v->lid,
        //         'name' => $v->lname,
        //         'url' => $v->url,
        //         'sort' => $v->sort
        //     ];
        //     if ($v->is_show === 0) {
        //         $link_data['deleted_at'] = date('Y-m-d H:i:s', time());
        //     }
        //     $friendshipLinkModel->addData($link_data);
        // }

        // 迁移配置项
        // $data = DB::connection('old')->table('config')->get()->toArray();
        // $configModel->truncate();
        // foreach ($data as $v) {
        //     $config_data = [
        //         'id' => $v->id,
        //         'name' => $v->name,
        //         'value' => $v->value
        //     ];
        //     $configModel->addData($config_data);
        // }

        // 迁移第三方登录用户表
        // $data = DB::connection('old')->table('oauth_user')->get()->toArray();
        // $oauthUserModel->truncate();
        // foreach ($data as $v) {
        //     $oauthUserData = [
        //         'id' => $v->id,
        //         'type' => $v->type,
        //         'name' => $v->nickname,
        //         'avatar' => $v->head_img,
        //         'openid' => $v->openid,
        //         'access_token' => $v->access_token,
        //         'last_login_ip' => $v->last_login_ip,
        //         'login_times' => $v->login_times,
        //         'email' => $v->email,
        //         'is_admin' => $v->is_admin
        //     ];
        //     $oauthUserModel->addData($oauthUserData);
        //     $editOauthUserMap = [
        //         'id' => $v->id,
        //     ];
        //     $editOauthUserData = [
        //         'created_at' => date('Y-m-d H:i:s', $v->create_time)
        //     ];
        //     $oauthUserModel->editData($editOauthUserMap, $editOauthUserData);
        // }

        // 迁移随言碎语表
        // $data = DB::connection('old')->table('chat')->get()->toArray();
        // $chatModel->truncate();
        // foreach ($data as $v) {
        //     $chatData = [
        //         'id' => $v->chid,
        //         'content' => $v->content,
        //     ];
        //     $chatModel->addData($chatData);
        //     $editChatMap = [
        //         'id' => $v->chid,
        //     ];
        //     $editChatData = [
        //         'created_at' => date('Y-m-d H:i:s', $v->date)
        //     ];
        //     $chatModel->editData($editChatMap, $editChatData);
        // }


    }

}
