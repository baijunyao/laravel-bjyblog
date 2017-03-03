<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    // 第三方登录
    Route::group(['prefix' => 'oauth'], function () {
        // 重定向
        Route::get('redirectToProvider/{service}', 'OAuthController@redirectToProvider');
        // 获取用户资料并登录
        Route::get('handleProviderCallback/{service}', 'OAuthController@handleProviderCallback');
        // 退出登录
        Route::get('logout', 'OAuthController@logout');
    });
});
Route::get('', 'Auth\AuthController@redirectToProvider');
Route::get('', 'Auth\AuthController@handleProviderCallback');

// Home 模块
Route::group(['namespace' => 'Home'], function () {
    // 首页
    Route::get('/', 'IndexController@index');
    // 文章详情页
    Route::get('article/{id}', 'ArticleController@index');
});


// Admin 模块
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // 首页控制器
    Route::group(['prefix' => 'index'], function () {
        // 后台首页
        Route::get('index', 'IndexController@index');
        // 从旧系统迁移数据
        Route::get('migration', 'IndexController@migration');
    });

    // 文章管理
    Route::group(['prefix' => 'article'], function () {
        // 文章列表
        Route::get('index', 'ArticleController@index');

        // 发布文章
        Route::get('create', 'ArticleController@create');
        Route::post('store', 'ArticleController@store');

        // 编辑文章
        Route::get('edit/{id}', 'ArticleController@edit');
        Route::post('update/{id}', 'ArticleController@update');

        // 上传图片
        Route::post('upload_image', 'ArticleController@upload_image');
    });
});