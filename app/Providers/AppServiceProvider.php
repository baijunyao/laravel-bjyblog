<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\GitProject;
use App\Models\Nav;
use App\Models\OauthUser;
use App\Models\Tag;
use Cache;
use App\Observers\CacheClearObserver;
use Illuminate\Support\ServiceProvider;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void|bool
     * @throws Exception
     */
    public function boot()
    {
        ini_set('memory_limit', "512M");

        // 为了防止 git clone 后 composer install
        // 因为还没运行迁移 php artisan package:discover 报错的问题
        // 如果表不存在则不再向下执行
        try {
            // 获取配置项
            $config = Cache::remember('config', 10080, function () {
                return Config::where('id', '>', 100)->pluck('value','name');
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

        // 开源项目数据
        view()->composer(['layouts/home', 'home/index/git'], function($view){
            $gitProject = Cache::remember('common:gitProject', 10080, function () {
                // 获取开源项目
                return GitProject::select('name', 'type')->orderBy('sort')->get();
            });
            // 分配数据
            $assign = compact('gitProject');
            $view->with($assign);
        });

        // 获取各种统计
        view()->composer(['layouts/home', 'admin/index/index'], function($view){
            $articleCount = Cache::remember('count:article', 10080, function () {
                // 统计文章总数
                return Article::count('id');
            });

            $commentCount = Cache::remember('count:comment', 10080, function () {
                // 统计评论总数
                return Comment::count('id');
            });

            $chatCount = Cache::remember('count:chat', 10080, function () {
                // 统计随言碎语总数
                return Chat::count('id');
            });

            $oauthUserCount = Cache::remember('count:oauthUser', 10080, function () {
                // 统计用户总数
                return OauthUser::count('id');
            });

            // 分配数据
            $assign = compact('articleCount', '', 'commentCount', 'chatCount', 'oauthUserCount');
            $view->with($assign);
        });

        //分配前台通用的数据
        view()->composer('layouts/home', function($view){
            $category = Cache::remember('common:category', 10080, function () {
                // 获取分类导航
                return Category::select('id', 'name')->orderBy('sort')->get();
            });

            $tag = Cache::remember('common:tag', 10080, function () {
                // 获取标签下的文章数统计
                return Tag::has('articles')->withCount('articles')->get();
            });

            $topArticle = Cache::remember('common:topArticle', 10080, function () {
                // 获取置顶推荐文章
                return Article::select('id', 'title')
                    ->where('is_top', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });

            $newComment = Cache::remember('common:newComment', 10080, function () {
                // 获取最新评论
                $commentModel = new Comment();
                return $commentModel->getNewData();
            });

            $friendshipLink = Cache::remember('common:friendshipLink', 10080, function () {
                // 获取友情链接
                return FriendshipLink::select('name', 'url')
                    ->orderBy('sort')
                    ->get();
            });

            $nav = Cache::remember('common:nav', 10080, function () {
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
                $qqQunArticle = Cache::remember('qqQunArticle', 10080, function () use($qunArticleId) {
                    return Article::select('id', 'title')->where('id', $qunArticleId)->first();
                });
            }

            // 分配数据
            $assign = compact('category', 'tag', 'topArticle', 'newComment', 'friendshipLink', 'nav', 'qqQunArticle');
            $view->with($assign);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
