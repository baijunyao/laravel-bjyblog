<?php

declare(strict_types=1);

// Home 模块
Route::name('home.')->group(function () {
    Route::name('article.')->group(function () {
        Route::get('/', \App\Http\Controllers\Home\ArticleController::class . '@index')->name('index');
        Route::get('article/{article}/{slug?}', \App\Http\Controllers\Home\ArticleController::class . '@show')->name('show');
        Route::get('search', \App\Http\Controllers\Home\ArticleController::class . '@search')->name('search');
    });
    Route::get('category/{category}/{slug?}', \App\Http\Controllers\Home\CategoryController::class . '@show')->name('category.show');
    Route::get('tag/{tag}/{slug?}', \App\Http\Controllers\Home\TagController::class . '@show')->name('tag.show');
    Route::get('note', \App\Http\Controllers\Home\NoteController::class . '@index')->name('note.index');
    Route::get('openSource', \App\Http\Controllers\Home\OpenSourceController::class . '@index')->name('openSource.index');
    Route::get('feed', \App\Http\Controllers\Home\FeedController::class . '@index')->name('feed.index');
    Route::prefix('site')->name('site.')->group(function () {
        Route::get('/', \App\Http\Controllers\Home\SiteController::class . '@index')->name('index');
        Route::post('store', \App\Http\Controllers\Home\SiteController::class . '@store')->name('store')->middleware('auth:socialite', 'clean.xss');
    });
    Route::middleware('auth:socialite')->group(function () {
        Route::get('socialiteUser/{socialiteUser}', \App\Http\Controllers\Home\SocialiteUserController::class . '@show')->name('socialiteUser.show');
        Route::post('comment', \App\Http\Controllers\Home\CommentController::class . '@store')->name('comment.store');
        Route::prefix('like')->name('like.')->group(function () {
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
        Route::get('logout', \App\Http\Controllers\Auth\SocialiteController::class . '@logout')->name('logout');
    });
});
