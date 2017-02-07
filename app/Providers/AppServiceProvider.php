<?php

namespace App\Providers;

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
        view()->composer('home/*',function($view){
            $tagModel = new Tag();
            $tag = $tagModel->getArticleCount();
            // 获取分类导航
            $category = Category::select('id', 'name')->get();
            $assign = [
                'cid' => 'index',
                'category' => $category,
                'tag' => $tag,
                'user' => [
                    'name' => session('user.name'),
                    'avatar' => session('user.avatar')
                ]
            ];
            $view->with($assign);
        });

        //分配后台通用的左侧导航数据
        view()->composer('admin/*',function($view){
            //分配登录用户的数据
            $loginUserData = [
                'name' => '白俊遥'
            ];
            $view->with('loginUserData', $loginUserData);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
