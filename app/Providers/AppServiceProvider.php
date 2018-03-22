<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\GitProject;
use App\Models\Tag;
use File;
use Cache;
use App\Observers\CacheClearObserver;
use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Database\QueryException;
use Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //分配前台通用的数据
        view()->composer('home/*', function($view){
            $category = Cache::remember('common:category', 10080, function () {
                // 获取分类导航
                return Category::select('id', 'name')->orderBy('sort')->get();
            });

            $tag = Cache::remember('common:tag', 10080, function () {
                // 获取标签下的文章数统计
                return Tag::withCount('articles')->get();
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

            $gitProject = Cache::remember('common:gitProject', 10080, function () {
                // 获取开源项目
                return GitProject::select('name', 'type')->orderBy('sort')->get();
            });

            // 分配数据
            $assign = compact('category', 'tag', 'topArticle', 'newComment', 'friendshipLink', 'gitProject');
            $view->with($assign);
        });

        // 使用 try catch 是为了解决 composer install 时候触发 php artisan optimize 但此时无数据库的问题
        try {
            // 获取配置项
            $config = Cache::remember('config', 10080, function () {
                return Config::pluck('value','name');
            });
            // 解决初次安装时候没有数据引起报错
            if ($config->isEmpty()) {
                Artisan::call('cache:clear');
            } else {
                // 用 config 表中的配置项替换 /config/ 目录下文件中的配置项
                $serviceConfig = [
                    'services.github.client_id' => $config['GITHUB_CLIENT_ID'],
                    'services.github.client_secret' => $config['GITHUB_CLIENT_SECRET'],

                    'services.qq.client_id' => $config['QQ_APP_ID'],
                    'services.qq.client_secret' => $config['QQ_APP_KEY'],

                    'services.weibo.client_id' => $config['SINA_API_KEY'],
                    'services.weibo.client_secret' => $config['SINA_SECRET'],
                ];
                config($serviceConfig);
            }
        } catch (QueryException $e) {
            // 此处清除缓存是为了解决上面无数据库时缓存时 config 缓存了空数据 db:seed 后 config 走了缓存为空的问题
            Artisan::call('cache:clear');
            $config = [];
        }
        // 分配全站通用的数据
        view()->composer('*', function ($view) use($config) {
            $assign = [
                'config' => $config
            ];
            // 获取赞赏捐款文章
            if (!empty($config['QQ_QUN_ARTICLE_ID'])) {
                $qqQunArticle = Cache::remember('qqQunArticle', 10080, function () use($config) {
                    return Article::select('id', 'title')->where('id', $config['QQ_QUN_ARTICLE_ID'])->first();
                });
                $assign['qqQunArticle'] = $qqQunArticle;
            }
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
