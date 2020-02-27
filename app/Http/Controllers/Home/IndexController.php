<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App;
use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    public function checkLogin()
    {
        return response()->json([
            'status' => (int) auth()->guard('socialite')->check(),
        ]);
    }

    public function feed()
    {
        // 获取文章
        $article = Article::select('id', 'author', 'title', 'description', 'html', 'created_at')
            ->latest()
            ->get();

        $feed              = App::make('feed');
        $feed->title       = config('app.name');
        $feed->description = config('bjyblog.head.description');
        $feed->logo        = asset('uploads/avatar/1.jpg');
        $feed->link        = url('feed');
        $feed->setDateFormat('carbon');
        $feed->pubdate     = $article->first()->created_at;
        $feed->lang        = config('app.locale');
        $feed->ctype       = 'application/xml';

        foreach ($article as $v) {
            $feed->add($v->title, $v->author, url('article', $v->id), $v->created_at, $v->description);
        }

        return $feed->render('atom');
    }
}
