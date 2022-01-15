<?php

declare(strict_types=1);

// Home 模块
Route::name('home.')->group(function () {
    Route::name('articles.')->group(function () {
        Route::get('/', \App\Http\Controllers\Home\ArticleController::class . '@index')->name('index');
        Route::get('articles/{article}/{slug?}', \App\Http\Controllers\Home\ArticleController::class . '@show')->name('show');
        Route::get('search', \App\Http\Controllers\Home\ArticleController::class . '@search')->name('search');
    });
    Route::get('categories/{category}/{slug?}', \App\Http\Controllers\Home\CategoryController::class . '@show')->name('categories.show');
    Route::get('tags/{tag}/{slug?}', \App\Http\Controllers\Home\TagController::class . '@show')->name('tags.show');
    Route::get('notes', \App\Http\Controllers\Home\NoteController::class . '@index')->name('notes.index');
    Route::get('openSources', \App\Http\Controllers\Home\OpenSourceController::class . '@index')->name('openSources.index');
    Route::get('feeds', \App\Http\Controllers\Home\FeedController::class . '@index')->name('feeds.index');
    Route::prefix('sites')->name('sites.')->group(function () {
        Route::get('/', \App\Http\Controllers\Home\SiteController::class . '@index')->name('index');
        Route::post('/', \App\Http\Controllers\Home\SiteController::class . '@store')->name('store')->middleware('auth:socialite', 'clean.xss');
    });
    Route::middleware('auth:socialite')->group(function () {
        Route::get('socialiteUsers/{socialiteUser}', \App\Http\Controllers\Home\SocialiteUserController::class . '@show')->name('socialiteUsers.show');
        Route::post('comments', \App\Http\Controllers\Home\CommentController::class . '@store')->name('comments.store');
        Route::prefix('likes')->name('likes.')->group(function () {
            Route::post('store', \App\Http\Controllers\Home\LikeController::class . '@store')->name('store');
            Route::delete('destroy', \App\Http\Controllers\Home\LikeController::class . '@destroy')->name('destroy');
        });
    });
});

// auth
Route::prefix('auth')->as('auth.')->group(function () {
    // Socialite
    Route::prefix('socialite')->as('socialite.')->group(function () {
        // 重定向
        Route::get('redirectToProvider/{service}', \App\Http\Controllers\Auth\SocialiteController::class . '@redirectToProvider')->name('redirectToProvider');
        // 获取用户资料并登录
        Route::get('handleProviderCallback/{service}', \App\Http\Controllers\Auth\SocialiteController::class . '@handleProviderCallback')->name('handleProviderCallback');
        // 退出登录
        Route::post('logout', \App\Http\Controllers\Auth\SocialiteController::class . '@logout')->name('logout');
    });
});
