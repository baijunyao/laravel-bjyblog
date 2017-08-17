<?php

namespace App\Providers;

use Cache;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Config;
use App\Models\FriendshipLink;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

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
            // 获取分类导航
            $category = Category::select('id', 'name')->get();

            // 获取标签下的文章数统计
            $tagModel = new Tag();
            $tag = $tagModel->getArticleCount();

            // 获取置顶推荐文章
            $topArticle = Article::select('id', 'title')
                ->where('is_top', 1)
                ->orderBy('created_at', 'desc')
                ->get();

            // 获取最新评论
            $commentModel = new Comment();
            $newComment = $commentModel->getNewData();

            // 获取友情链接
            $friendshipLink = FriendshipLink::select('name', 'url')->orderBy('sort')->get();

            $assign = [
                'category' => $category,
                'tag' => $tag,
                'topArticle' => $topArticle,
                'newComment' => $newComment,
                'friendshipLink' => $friendshipLink,

            ];
            $view->with($assign);
        });

        // 分配全站通用的数据
        view()->composer('*', function ($view) {
            // 获取配置项
            $config = Cache::remember('article', 10080, function () {
                return Config::pluck('value','name');
            });
            $assign = [
                'config' => $config
            ];
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
        // 逆向迁移
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }
}
