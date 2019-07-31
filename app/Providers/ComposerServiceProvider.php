<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\GitProject;
use App\Models\Nav;
use App\Models\Note;
use App\Models\SocialiteClient;
use App\Models\SocialiteUser;
use App\Models\Tag;
use Cache;
use Exception;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    protected const CACHE_EXPIRE = 86400; // One day in second

    /**
     * Bootstrap the application services.
     *
     * @throws Exception
     *
     * @return void
     */
    public function boot()
    {
        // 为了防止 git clone 后 composer install
        // 因为还没运行迁移 php artisan package:discover 报错的问题
        // 如果表不存在则不再向下执行
        try {
            // 获取配置项
            $config = Cache::remember('config', static::CACHE_EXPIRE, function () {
                return Config::where('id', '>', 100)->pluck('value', 'name');
            });
        } catch (Exception $exception) {
            return true;
        }

        /**
         * 如果已经执行了 migrate ；
         * 当再当执行 db:seed 的时候上面的 try 并不会触发错误
         * 而是缓存了一个空的 config
         * 所以此处需要清空缓存并不再向下执行
         */
        if ($config->isEmpty()) {
            cache()->forget('config');

            return true;
        }

        // 动态替换 /config 目录下的配置项
        config($config->toArray());

        try {
            // Get socialite clients
            $socialiteClients = Cache::remember('socialiteClients', static::CACHE_EXPIRE, function () {
                return SocialiteClient::all();
            });
        } catch (Exception $exception) {
            return true;
        }

        $socialiteClients->map(function ($socialiteClient) {
            config([
                'services.' . $socialiteClient->name . '.client_id'     => $socialiteClient->client_id,
                'services.' . $socialiteClient->name . '.client_secret' => $socialiteClient->client_secret,
            ]);
        });

        // 开源项目数据
        view()->composer(['layouts/home', 'home/index/git'], function ($view) {
            $gitProject = Cache::remember('common:gitProject', static::CACHE_EXPIRE, function () {
                // 获取开源项目
                return GitProject::select('name', 'type')->orderBy('sort')->get();
            });
            // 分配数据
            $assign = compact('gitProject');
            $view->with($assign);
        });

        // 获取各种统计
        view()->composer(['layouts/home', 'admin/index/index'], function ($view) {
            $articleCount = Cache::remember('count:article', static::CACHE_EXPIRE, function () {
                // 统计文章总数
                return Article::count('id');
            });

            $commentCount = Cache::remember('count:comment', static::CACHE_EXPIRE, function () {
                // 统计评论总数
                return Comment::count('id');
            });

            $chatCount = Cache::remember('count:note', static::CACHE_EXPIRE, function () {
                // 统计随言碎语总数
                return Note::count('id');
            });

            $socialiteUserCount = Cache::remember('count:socialiteUser', static::CACHE_EXPIRE, function () {
                // 统计用户总数
                return SocialiteUser::count('id');
            });

            // 分配数据
            $assign = compact('articleCount', 'commentCount', 'chatCount', 'socialiteUserCount');
            $view->with($assign);
        });

        //分配前台通用的数据
        view()->composer('layouts/home', function ($view) use ($socialiteClients) {
            $category = Cache::remember('common:category', static::CACHE_EXPIRE, function () {
                // 获取分类导航
                return Category::select('id', 'name', 'slug')->orderBy('sort')->get();
            });

            $tag = Cache::remember('common:tag', static::CACHE_EXPIRE, function () {
                // 获取标签下的文章数统计
                return Tag::has('articles')->withCount('articles')->get();
            });

            $topArticle = Cache::remember('common:topArticle', static::CACHE_EXPIRE, function () {
                // 获取置顶推荐文章
                return Article::select('id', 'title', 'slug')
                    ->where('is_top', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });

            $friendshipLink = Cache::remember('common:friendshipLink', static::CACHE_EXPIRE, function () {
                // 获取友情链接
                return FriendshipLink::select('name', 'url')
                    ->orderBy('sort')
                    ->get();
            });

            $nav = Cache::remember('common:nav', static::CACHE_EXPIRE, function () {
                // 获取菜单
                return Nav::select('name', 'url')
                    ->orderBy('sort')
                    ->get();
            });

            // 获取赞赏捐款文章
            $qunArticleId = config('bjyblog.qq_qun.article_id');
            if (empty($qunArticleId)) {
                $qqQunArticle = [];
            } else {
                $qqQunArticle = Cache::remember('qqQunArticle', static::CACHE_EXPIRE, function () use ($qunArticleId) {
                    return Article::select('id', 'title')->where('id', $qunArticleId)->first();
                });
            }

            $socialiteClients = $socialiteClients->filter(function ($socialiteClient) {
                return !empty($socialiteClient->client_id) && !empty($socialiteClient->client_secret);
            });

            // 分配数据
            $assign = compact('category', 'tag', 'topArticle', 'friendshipLink', 'nav', 'qqQunArticle', 'socialiteClients');
            $view->with($assign);
        });

        view()->composer(['layouts/home', 'admin/index/index'], function ($view) {
            $latestComments = Cache::remember('common:latestComments', static::CACHE_EXPIRE, function () {
                return Comment::with(['article', 'socialiteUser'])
                    ->whereHas('socialiteUser', function ($query) {
                        $query->where('is_admin', 0);
                    })
                    ->has('article')
                    ->orderBy('created_at', 'desc')
                    ->limit(17)
                    ->get()
                    ->each(function ($comment) {
                        $comment->sub_content = strip_tags($comment->content);

                        if (mb_strlen($comment->sub_content) > 10) {
                            $comment->sub_content = re_substr($comment->sub_content, 0, 40);
                        }

                        $comment->article->sub_title = re_substr($comment->article->title, 0, 20);

                        return $comment;
                    });
            });

            $assign = compact('latestComments');
            $view->with($assign);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
