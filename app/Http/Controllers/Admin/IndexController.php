<?php

namespace App\Http\Controllers\Admin;

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
use Markdownify\Converter;
use Markdownify\ConverterExtra;

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


    public function migration(Article $articleModel, ArticleTag $articleTag, Comment $commentModel, FriendshipLink $friendshipLinkModel, Config $configModel, OauthUser $oauthUserModel)
    {
        // $htmlConverter = new HtmlConverter();
        // // $htmlConverter = new \HTML_To_Markdown();
        // $test = DB::connection('old')->table('article')->where('aid', 105)->first();
        // $content = htmlspecialchars_decode($test->content);
        // $content = str_replace('<br style="box-sizing: inherit; margin-bottom: 0px;"/>', '', $content);
        // $content = str_replace('/Upload/image/ueditor', 'uploads/article', $content);
        // $content = str_replace(['<pre class="brush:', '</pre>', ';toolbar:false">', '&nbsp;', '<p><br/></p>'], ["\r\n```", "\r\n```\r\n", "\r\n", ' ', "\r\n"], $content);
        // $content = str_replace('```js', '```javascript', $content);
        // $content = str_replace("\r\n", '|rn|', $content);
        // $content = str_replace('<p>', '', $content);
        // $content = str_replace('</p>', '|rn|', $content);
        // $markdown = $htmlConverter->convert($content);
        // $markdown = htmlspecialchars($markdown);
        // $markdown = str_replace(['|rn|', '\*', '\_', '|s|'], ["\r\n", '*', '_', ' '], $markdown);
        // $markdown = str_replace("\r\n\r\n", "\r\n", $markdown);
        // $markdown = str_replace('http://www.baijunyao.com/uploads/article', 'uploads/article', $markdown);
        // echo $markdown;die;


        // 从旧系统中迁移文章
        // $htmlConverter = new HtmlConverter();
        // $data = DB::connection('old')->table('article')->get()->toArray();
        // $articleModel->truncate();
        // foreach ($data as $k => $v) {
        //     $content = htmlspecialchars_decode($v->content);
        //     $content = str_replace('<br style="box-sizing: inherit; margin-bottom: 0px;"/>', '', $content);
        //     $content = str_replace('/Upload/image/ueditor', '/uploads/article', $content);
        //     $content = str_replace(['<pre class="brush:', '</pre>', ';toolbar:false">', '&nbsp;', '<p><br/></p>'], ["\r\n```", "\r\n```\r\n", "\r\n", ' ', "\r\n"], $content);
        //     $content = str_replace('```js', '```javascript', $content);
        //     $content = str_replace("\r\n", '|rn|', $content);
        //     $content = str_replace('<p>', '', $content);
        //     $content = str_replace('</p>', '|rn|', $content);
        //     $markdown = $htmlConverter->convert($content);
        //     $markdown = htmlspecialchars($markdown);
        //     $markdown = str_replace(['|rn|', '\*', '\_', "\n "], ["\r\n", '*', '_', "\n    "], $markdown);
        //     $markdown = str_replace("\r\n\r\n", "\r\n", $markdown);
        //     $markdown = str_replace('http://www.baijunyao.com/uploads/article', 'uploads/article', $markdown);
        //     $article = [
        //         'id' => $v->aid,
        //         'category_id' => $v->cid,
        //         'title' => $v->title,
        //         'author' => $v->author,
        //         'content' => $markdown,
        //         'description' => $v->description,
        //         'keywords' => $v->keywords,
        //         'cover' => $articleModel->getCover($markdown),
        //         'is_top' => $v->is_top,
        //         'click' => $v->click,
        //     ];
        //     $articleModel->create($article);
        //     $editArticleMap = [
        //         'id' => $v->aid
        //     ];
        //
        //     $editArticleData = [
        //         'created_at' => date('Y-m-d H:i:s', $v->addtime)
        //     ];
        //     $articleModel->editData($editArticleMap, $editArticleData);
        // }

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
        //         'content' => $v->content,
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
        $data = DB::connection('old')->table('oauth_user')->get()->toArray();
        $oauthUserModel->truncate();
        die;
        foreach ($data as $v) {
            $config_data = [
                'id' => $v->id,
                'user_id' => $v->uid,
                'type' => $v->type,
                'nickname' => $v->nickname,
                'avatar' => $v->head_img,
                'openid' => $v->openid,
                'access_token' => $v->access_token,
                'last_login_ip' => $v->last_login_ip,
                'login_times' => $v->login_times,
                'email' => $v->email,
                'is_admin' => $v->is_admin
            ];
            $configModel->addData($config_data);
        }



    }

}
