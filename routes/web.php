<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Home\ArticleController;
use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\Home\CommentController;
use App\Http\Controllers\Home\FeedController;
use App\Http\Controllers\Home\LikeController;
use App\Http\Controllers\Home\NoteController;
use App\Http\Controllers\Home\OpenSourceController;
use App\Http\Controllers\Home\SiteController;
use App\Http\Controllers\Home\SocialiteUserController;
use App\Http\Controllers\Home\TagController;

// Home 模块
Route::name('home.')->group(function () {
    Route::name('articles.')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('articles/{article}/{slug?}', [ArticleController::class, 'show'])->name('show');
        Route::get('search', [ArticleController::class, 'search'])->name('search');
    });
    Route::get('categories/{category}/{slug?}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('tags/{tag}/{slug?}', [TagController::class, 'show'])->name('tags.show');
    Route::get('notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('openSources', [OpenSourceController::class, 'index'])->name('openSources.index');
    Route::get('feeds', [FeedController::class, 'index'])->name('feeds.index');
    Route::prefix('sites')->name('sites.')->group(function () {
        Route::get('/', [SiteController::class, 'index'])->name('index');
        Route::post('/', [SiteController::class, 'store'])->name('store')->middleware('auth:socialite', 'clean.xss');
    });
    Route::middleware('auth:socialite')->group(function () {
        Route::get('socialiteUsers/{socialiteUser}', [SocialiteUserController::class, 'show'])->name('socialiteUsers.show');
        Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
        Route::prefix('likes')->name('likes.')->group(function () {
            Route::post('store', [LikeController::class, 'store'])->name('store');
            Route::delete('destroy', [LikeController::class, 'destroy'])->name('destroy');
        });
    });
});

// auth
Route::prefix('auth')->as('auth.')->group(function () {
    // Socialite
    Route::prefix('socialite')->as('socialite.')->group(function () {
        // 重定向
        Route::get('redirectToProvider/{service}', [SocialiteController::class, 'redirectToProvider'])->name('redirectToProvider');
        // 获取用户资料并登录
        Route::get('handleProviderCallback/{service}', [SocialiteController::class, 'handleProviderCallback'])->name('handleProviderCallback');
        // 退出登录
        Route::post('logout', [SocialiteController::class, 'logout'])->name('logout');
    });
});
