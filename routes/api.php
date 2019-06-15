<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Resource')->group(function () {
    // Route::resource('categories', 'CategoryController');
    Route::apiResource('articles', 'ArticleController');
    Route::apiResource('tags', 'TagController');

    Route::patch('articles/{article}/restore', 'ArticleController@restore')->name('articles.restore');
    Route::patch('tags/{tag}/restore', 'TagController@restore')->name('tags.restore');
    Route::delete('tags/{tag}/forceDelete', 'TagController@forceDelete')->name('tags.forceDelete');
});
