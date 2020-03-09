<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use Agent;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Cache;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select(
            'id', 'category_id', 'title',
            'slug', 'author', 'description',
            'cover', 'is_top', 'created_at'
        )
            ->orderBy('created_at', 'desc')
            ->with(['category', 'tags'])
            ->paginate(10);

        $head = [
            'title'       => config('bjyblog.head.title'),
            'keywords'    => config('bjyblog.head.keywords'),
            'description' => config('bjyblog.head.description'),
        ];

        $assign = [
            'category_id'  => 'index',
            'articles'     => $articles,
            'head'         => $head,
            'tagName'      => '',
        ];

        return view('home.index.index', $assign);
    }

    public function show(Article $article, Request $request, Comment $commentModel)
    {
        $ipAndId = 'articleRequestList' . $request->ip() . ':' . $article->id;

        if (!Cache::has($ipAndId)) {
            // TODO
            Cache::put($ipAndId, '', 1400);
            $article->increment('views');
        }

        $prev = Article::select('id', 'title', 'slug')
            ->orderBy('created_at', 'desc')
            ->where('id', '<', $article->id)
            ->limit(1)
            ->first();

        $next = Article::select('id', 'title', 'slug')
            ->orderBy('created_at', 'asc')
            ->where('id', '>', $article->id)
            ->limit(1)
            ->first();

        $comment     = $commentModel->getDataByArticleId($article->id);
        $category_id = $article->category->id;

        /** @var \App\Models\SocialiteUser $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();

        if ($socialiteUser === null) {
            $is_liked = false;
        } else {
            $is_liked = $socialiteUser->hasLiked($article);
        }

        $likes       = $article->likers()->get();
        $assign      = compact('category_id', 'article', 'prev', 'next', 'comment', 'is_liked', 'likes');

        return view('home.index.article', $assign);
    }

    public function search(Request $request, Article $articleModel)
    {
        if (Agent::isRobot()) {
            abort(404);
        }

        $wd = clean($request->input('wd'));
        $id = $articleModel->searchArticleGetId($wd);

        $articles = Article::select(
            'id', 'category_id', 'title',
            'author', 'description', 'cover',
            'is_top', 'created_at'
        )
            ->whereIn('id', $id)
            ->orderBy('created_at', 'desc')
            ->with(['category', 'tags'])
            ->paginate(10);

        $head = [
            'title'       => $wd,
            'keywords'    => '',
            'description' => '',
        ];

        $assign = [
            'category_id'  => 'index',
            'articles'     => $articles,
            'tagName'      => '',
            'title'        => $wd,
            'head'         => $head,
        ];

        return response()->view('home.index.index', $assign)
            ->header('X-Robots-Tag', 'noindex');
    }
}
