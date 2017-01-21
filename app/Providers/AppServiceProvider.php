<?php

namespace App\Providers;

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
