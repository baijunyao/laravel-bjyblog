<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use Agent;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Str;

class ArticleController extends Controller
{
    public function index(): View
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

    public function show(Article $article, Request $request): View
    {
        $ip_and_id = 'articleRequestList' . $request->ip() . ':' . $article->id;

        if (!Cache::has($ip_and_id)) {
            // TODO
            Cache::put($ip_and_id, '', 1400);
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

        $comment_flat_tree = Comment::where('article_id', $article->id)
            ->with('socialiteUser', 'socialiteUser.socialiteClient', 'parentComment', 'parentComment.socialiteUser')
            ->when(Str::isTrue(config('bjyblog.comment_audit')), function ($query) {
                return $query->where('is_audited', 1);
            })
            ->withDepth()
            ->get()
            ->toFlatTree();

        $parent_comments = $comment_flat_tree->whereNull('parent_id')
            ->sortByDesc('created_at')
            ->values();

        $children_comments = $comment_flat_tree->whereNotNull('parent_id')->values();

        $comments = collect([]);

        foreach ($parent_comments as $parent_comment) {
            $comments->push($parent_comment);

            foreach ($children_comments as $children_comment) {
                if ($children_comment->isDescendantOf($parent_comment)) {
                    $comments->push($children_comment);
                }
            }
        }

        /** @var \App\Models\Category $category */
        $category = $article->category;

        $category_id = $category->id;

        /** @var \App\Models\SocialiteUser|null $socialite_user */
        $socialite_user = auth()->guard('socialite')->user();

        if ($socialite_user === null) {
            $is_liked = false;
        } else {
            $is_liked = $socialite_user->hasLiked($article);
        }

        $likes  = $article->likers()->get();
        $assign = compact('category_id', 'article', 'prev', 'next', 'comments', 'is_liked', 'likes');

        return view('home.index.article', $assign);
    }

    public function search(Request $request): Response
    {
        if (Agent::isRobot()) {
            abort(404);
        }

        $wd = clean($request->input('wd'));

        $articles = Article::select(
            'id', 'category_id', 'title',
            'author', 'description', 'cover',
            'is_top', 'created_at'
        )
            ->whereIn('id', Article::getIdsGivenSearchWord($wd))
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
