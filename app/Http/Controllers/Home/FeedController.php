<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App;
use App\Http\Controllers\Controller;
use App\Models\Article;

class FeedController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'author', 'title', 'description', 'html', 'created_at')
            ->latest()
            ->get();

        $feed              = App::make('feed');
        $feed->title       = config('app.name');
        $feed->description = config('bjyblog.head.description');
        $feed->logo        = asset('uploads/avatar/1.jpg');
        $feed->link        = url('feed');
        $feed->setDateFormat('carbon');
        $feed->pubdate     = $articles->first()->created_at;
        $feed->lang        = config('app.locale');
        $feed->ctype       = 'application/xml';
        $feed->setShortening(true);
        $feed->setTextLimit(100);

        foreach ($articles as $article) {
            $feed->addItem([
                'title'       => $article->title,
                'author'      => $article->author,
                'link'        => url('article', $article->id),
                'description' => $article->description,
                'content'     => $article->html,
                'pubdate'     => $article->created_at,
            ]);
        }

        return $feed->render('atom');
    }
}
