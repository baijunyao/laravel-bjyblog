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
        Route::post('update', 'ArticleController@update');

        // 上传图片
        Route::post('upload_image', 'ArticleController@upload_image');
    });
});