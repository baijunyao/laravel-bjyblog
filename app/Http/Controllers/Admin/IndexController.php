<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
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


    public function migration(Article $articleModel)
    {
        $htmlConverter = new HtmlConverter(['strip_tags' => true]);
        $test = \DB::connection('old')->table('article')->where('aid', 20)->first();
        $content = $test->content;
        $content = htmlspecialchars_decode($content);
        $content = str_replace(['<pre class="brush:', '</pre>', ';toolbar:false">'], ['```', "\r\n```", "\r\n"], $content);
        $content = $htmlConverter->convert($content);
        p($content);die;
        $data = \DB::connection('old')->table('article')->get()->toArray();
        $articleModel->truncate();
        foreach ($data as $k => $v) {
            $content = htmlspecialchars_decode($v->content);
            $article = [
                'id' => $v->aid,
                'category_id' => $v->cid,
                'title' => $v->title,
                'author' => $v->author,
                'content' => $htmlConverter->convert($content),
                'description' => $v->description,
                'keywords' => $v->keywords,
                'is_top' => $v->is_top,
                'click' => $v->click,
                'created_at' => date('Y-m-d H:i:s', $v->addtime)
            ];
            $articleModel->create($article);
        }
        // p($data);
    }

}
