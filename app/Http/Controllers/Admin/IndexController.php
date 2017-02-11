<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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


    public function migration(Article $articleModel, ArticleTag $articleTag, Comment $comment)
    {
        $htmlConverter = new HtmlConverter(['strip_tags' => true]);
        // $test = \DB::connection('old')->table('article')->where('aid', 20)->first();
        // $content = $test->content;
        // $content = htmlspecialchars_decode($content);
        // $content = str_replace(['<pre class="brush:', '</pre>', ';toolbar:false">'], ['```', "\r\n```", "\r\n"], $content);
        // $content = $htmlConverter->convert($content);
        // p($content);die;

        // 从旧系统中迁移文章
        // $htmlConverter = new HtmlConverter(['strip_tags' => true]);
        // $data = \DB::connection('old')->table('article')->get()->toArray();
        // $articleModel->truncate();
        // foreach ($data as $k => $v) {
        //     $content = htmlspecialchars_decode($v->content);
        //     $article = [
        //         'id' => $v->aid,
        //         'category_id' => $v->cid,
        //         'title' => $v->title,
        //         'author' => $v->author,
        //         'content' => $htmlConverter->convert($content),
        //         'description' => $v->description,
        //         'keywords' => $v->keywords,
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
        // $data = \DB::connection('old')->table('article_tag')->get()->toArray();
        // $articleTag->truncate();
        // foreach ($data as $v) {
        //     $article_tag = [
        //         'article_id' => $v->aid,
        //         'tag_id' => $v->tid
        //     ];
        //     $articleTag->addData($article_tag);
        // }

        // 从旧系统中迁移评论
        $data = \DB::connection('old')->table('comment')->get()->toArray();
        $comment->truncate();
        foreach ($data as $v) {
            $comment_data = [
                'id' => $v['cmtid'],
                'oauth_user_id' => $v['ouid'],
                'type' => $v['type'],
                'pid' => $v['pid'],
                'article_id' => $v['aid'],
                'content' => $v['content'],
                'status' => $v['status'],
            ];
            $comment->create($comment_data);
            $editCommentMap = [
                'id' => $v['id']
            ];
            $editCommentData = [
                'created_at' => date('Y-m-d H:i:s', $v['date'])
            ];
            $articleModel->editData($editCommentMap, $editCommentData);
        }
        



    }

}
