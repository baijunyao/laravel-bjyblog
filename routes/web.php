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
    Route::group(['prefix' => 'index'], function () {
        // 后台首页
        Route::get('index', 'IndexController@index');
    });
});