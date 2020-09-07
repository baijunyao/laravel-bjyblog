<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\Nav;
use App\Models\Note;
use App\Models\OpenSource;
use App\Models\SocialiteClient;
use App\Models\SocialiteUser;
use App\Models\Tag;
use Artisan;
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
            $config = Config::where('id', '>', 100)->pluck('value', 'name');
        } catch (Exception $exception) {
            return;
        }

        /**
         * 如果已经执行了 migrate ；
         * 当再当执行 db:seed 的时候上面的 try 并不会触发错误
         * 而是缓存了一个空的 config
         * 所以此处需要清空缓存并不再向下执行
         */
        if ($config->isEmpty()) {
            Artisan::call('modelCache:clear');

            return;
        }

        // 动态替换 /config 目录下的配置项
        config($config->toArray());

        try {
            // Get socialite clients
            $socialiteClients = SocialiteClient::all();
        } catch (Exception $exception) {
            return;
        }

        $socialiteClients->map(function ($socialiteClient) {
            config([
                'services.' . $socialiteClient->name . '.client_id'     => $socialiteClient->client_id,
                'services.' . $socialiteClient->name . '.client_secret' => $socialiteClient->client_secret,
            ]);
        });

        // 开源项目数据
        view()->composer(['layouts/home', 'home/index/openSource'], function ($view) {
            $openSources = OpenSource::select('name', 'type')->orderBy('sort')->get();
            // 分配数据
            $assign = compact('openSources');
            $view->with($assign);
        });

        // 获取各种统计
        view()->composer(['layouts/home', 'admin/index/index'], function ($view) {
            $articleCount = Article::count('id');
            $commentCount = Comment::count('id');
            $chatCount = Note::count('id');

            /* SocialiteUser model not use @see \GeneaLabs\LaravelModelCaching\Traits\Cachable */
            $socialiteUserCount = Cache::remember('count:socialiteUser', static::CACHE_EXPIRE, function () {
                return SocialiteUser::count('id');
            });

            // 分配数据
            $assign = compact('articleCount', 'commentCount', 'chatCount', 'socialiteUserCount');
            $view->with($assign);
        });

        //分配前台通用的数据
        view()->composer('layouts/home', function ($view) use ($socialiteClients) {
            $category = Category::select('id', 'name', 'slug')->orderBy('sort')->get();
            $tag = Tag::has('articles')->withCount('articles')->get();

            $topArticle = Article::select('id', 'title', 'slug')
                ->where('is_top', 1)
                ->orderBy('created_at', 'desc')
                ->get();

            $friendshipLink = FriendshipLink::select('name', 'url')
                ->orderBy('sort')
                ->get();

            $nav = Nav::select('name', 'url')
                ->orderBy('sort')
                ->get();

            // 获取赞赏捐款文章
            $qunArticleId = config('bjyblog.qq_qun.article_id');
            if (empty($qunArticleId)) {
                $qqQunArticle = [];
            } else {
                $qqQunArticle = Article::select('id', 'title')->where('id', $qunArticleId)->first();
            }

            $socialiteClients = $socialiteClients->filter(function ($socialiteClient) {
                return !empty($socialiteClient->client_id) && !empty($socialiteClient->client_secret);
            });

            $homeFootColNumber = array_filter(config('bjyblog.social_links')) === [] ? 4 : 3;

            // 分配数据
            $assign = compact('category', 'tag', 'topArticle', 'friendshipLink', 'nav', 'qqQunArticle', 'socialiteClients', 'homeFootColNumber');
            $view->with($assign);
        });

        view()->composer(['layouts/home', 'admin/index/index'], function ($view) {
            $latestComments = (new Comment())->getLatestComments(17);

            $assign = compact('latestComments');
            $view->with($assign);
        });

        view()->composer(['admin/config/*'], function ($view) use ($config) {
            $assign = compact('config');
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
