<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use Agent;
use App\Models\Article;
use App\Models\Comment;
use Cache;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use RuntimeException;
use Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $head = config('bjyblog.head');

        if (config('bjyblog.theme') === 'blueberry') {
            $articles = Article::select(
                'id', 'category_id', 'title',
                'slug', 'author', 'description',
                'cover', 'is_top', 'created_at'
            )
                ->orderBy('created_at', 'desc')
                ->with(['category', 'tags'])
                ->paginate(10);

            $assign = [
                'category_id'  => 'index',
                'articles'     => $articles,
                'head'         => $head,
                'tagName'      => '',
            ];
        } elseif (config('bjyblog.theme') === 'github') {
            $pinnedArticles = Article::where('is_top', 1)
                ->with('category', 'tags')
                ->orderBy('created_at', 'desc')
                ->get();

            $selectedYear = Carbon::createFromFormat('Y', $request->input('year', now()->year));

            $yearArticles     = Article::whereYear('created_at', '=', $selectedYear)->get();
            $firstArticleDate = Article::orderBy('created_at')->value('created_at') ?? now();

            $calendarGraphYears = [];

            while (!$firstArticleDate->isCurrentYear()) {
                $calendarGraphYears[] = $firstArticleDate->year;

                $firstArticleDate = $firstArticleDate->addYear();
            }

            $calendarGraphYears[] = now()->year;

            rsort($calendarGraphYears);

            $articlesCount = Article::selectRaw('COUNT(*) AS count, DATE(created_at) as date')
                ->groupBy('date')
                ->get()
                ->keyBy('date')
                ->toArray();

            $allDaysOfTheYear = CarbonPeriod::create($selectedYear->firstOfYear()->format('Y-m-d'), $selectedYear->endOfYear()->format('Y-m-d'));

            $calendarGraph = [];
            $x             = 14;

            foreach ($allDaysOfTheYear as $key => $date) {
                /** @var \Carbon\Carbon $date */
                $dateString = $date->format('Y-m-d');
                $count      = $articlesCount[$dateString]['count'] ?? 0;
                $fill       = $count === 0 ? '#ebedf0' : '#c6e48b';

                if ($date->month === 12 && $date->weekOfYear === 1) {
                    $calendarGraph[53][] = [
                        'x'     => $x,
                        'y'     => $date->dayOfWeek * 13,
                        'date'  => $dateString,
                        'count' => $count,
                        'fill'  => $fill,
                    ];
                } else {
                    $weekOfYear = $date->dayOfWeek === 0 ? $date->weekOfYear + 1 : $date->weekOfYear;

                    $calendarGraph[$weekOfYear][] = [
                        'x'     => $x,
                        'y'     => $date->dayOfWeek * 13,
                        'date'  => $dateString,
                        'count' => $count,
                        'fill'  => $fill,
                    ];
                }

                if ($date->dayOfWeekIso === 7) {
                    $x--;
                }
            }

            $assign = compact('yearArticles', 'pinnedArticles', 'calendarGraphYears', 'calendarGraph', 'head', 'selectedYear');
        } else {
            throw new RuntimeException('Unsupported theme.');
        }

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

        $commentFlatTree = Comment::where('article_id', $article->id)
            ->with('socialiteUser', 'socialiteUser.socialiteClient', 'parentComment', 'parentComment.socialiteUser')
            ->when(Str::isTrue(config('bjyblog.comment_audit')), function ($query) {
                return $query->where('is_audited', 1);
            })
            ->withDepth()
            ->get()
            ->toFlatTree();

        $parentComments = $commentFlatTree->whereNull('parent_id')
            ->sortByDesc('created_at')
            ->values();

        $childrenComments = $commentFlatTree->whereNotNull('parent_id')->values();

        $comments = collect([]);

        foreach ($parentComments as $parentComment) {
            $comments->push($parentComment);

            foreach ($childrenComments as $childrenComment) {
                if ($childrenComment->isDescendantOf($parentComment)) {
                    $comments->push($childrenComment);
                }
            }
        }

        $category_id = $article->category->id;

        /** @var \App\Models\SocialiteUser|null $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();

        if ($socialiteUser === null) {
            $is_liked = false;
        } else {
            $is_liked = $socialiteUser->hasLiked($article);
        }

        $likes       = $article->likers()->get();
        $assign      = compact('category_id', 'article', 'prev', 'next', 'comments', 'is_liked', 'likes');

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
