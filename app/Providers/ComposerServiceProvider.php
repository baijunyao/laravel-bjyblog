<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Friend;
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
     * @throws \Exception
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
            Artisan::call('cache:clear');

            return;
        }

        /** @var string $tencent_cloud_project_id */
        $tencent_cloud_project_id                    = $config['services.tencent_cloud.project_id'] ?? '';
        $config['services.tencent_cloud.project_id'] = (int) $tencent_cloud_project_id;

        // 动态替换 /config 目录下的配置项
        config($config->toArray());

        try {
            // Get socialite clients
            $socialite_clients = SocialiteClient::all();
        } catch (Exception $exception) {
            return;
        }

        $socialite_clients->map(function ($socialiteClient) {
            config([
                'services.' . $socialiteClient->name . '.client_id'     => $socialiteClient->client_id,
                'services.' . $socialiteClient->name . '.client_secret' => $socialiteClient->client_secret,
            ]);
        });

        // 开源项目数据
        view()->composer(['layouts/home', 'home/index/openSource'], function ($view) {
            $open_sources = OpenSource::select('name', 'type')->orderBy('sort')->get();
            // 分配数据
            $assign = compact('open_sources');
            $view->with($assign);
        });

        // 获取各种统计
        view()->composer(['layouts/home', 'admin/index/index'], function ($view) {
            $article_count = Article::count('id');
            $comment_count = Comment::count('id');
            $chat_count    = Note::count('id');

            $socialite_user_count = Cache::remember('count:socialiteUser', static::CACHE_EXPIRE, function () {
                return SocialiteUser::count('id');
            });

            // 分配数据
            $assign = compact('article_count', 'comment_count', 'chat_count', 'socialite_user_count');
            $view->with($assign);
        });

        // 分配前台通用的数据
        view()->composer('layouts/home', function ($view) use ($socialite_clients) {
            $categories = Category::select('id', 'name', 'slug')->orderBy('sort')->get();
            $tags       = Tag::has('articles')->withCount('articles')->get();

            $top_article = Article::select('id', 'title', 'slug')
                ->where('is_top', 1)
                ->orderBy('created_at', 'desc')
                ->get();

            $friends = Friend::select('name', 'url')
                ->orderBy('sort')
                ->get();

            $navs = Nav::select('name', 'url')
                ->orderBy('sort')
                ->get();

            // 获取赞赏捐款文章
            $qun_article_id = config('bjyblog.qq_qun.article_id');

            if (empty($qun_article_id)) {
                $qq_qun_article = [];
            } else {
                $qq_qun_article = Article::select('id', 'title')->where('id', $qun_article_id)->first();
            }

            $socialite_clients = $socialite_clients->filter(function ($socialiteClient) {
                return !empty($socialiteClient->client_id) && !empty($socialiteClient->client_secret);
            });

            $home_foot_col_number = array_filter(config('bjyblog.social_links')) === [] ? 4 : 3;

            // 分配数据
            $assign = compact('categories', 'tags', 'top_article', 'friends', 'navs', 'qq_qun_article', 'socialite_clients', 'home_foot_col_number');
            $view->with($assign);
        });

        view()->composer(['layouts/home', 'admin/index/index'], function ($view) {
            $latest_comments = (new Comment())->getLatestComments(17);

            $assign = compact('latest_comments');
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
