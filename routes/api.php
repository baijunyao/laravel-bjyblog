<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->as('auth.')->group(function () {
    Route::prefix('passport')->as('passport.')->middleware('auth:api')->group(function () {
        Route::post('logout', \App\Http\Controllers\Auth\PassportController::class . '@logout')->name('logout');
    });
});

Route::prefix('dashboard')->as('dashboard.')->middleware('auth:api')->group(function () {
    Route::get('analysis', \App\Http\Controllers\DashboardController::class . '@analysis')->name('analysis');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('categories', \App\Http\Controllers\Resources\CategoryController::class);
    Route::patch('categories/{categorie}/restore', \App\Http\Controllers\Resources\CategoryController::class . '@restore')->name('categories.restore');
    Route::delete('categories/{categorie}/forceDelete', \App\Http\Controllers\Resources\CategoryController::class . '@forceDelete')->name('categories.forceDelete');

    Route::apiResource('tags', \App\Http\Controllers\Resources\TagController::class);
    Route::patch('tags/{tag}/restore', \App\Http\Controllers\Resources\TagController::class . '@restore')->name('tags.restore');
    Route::delete('tags/{tag}/forceDelete', \App\Http\Controllers\Resources\TagController::class . '@forceDelete')->name('tags.forceDelete');

    Route::apiResource('articles', \App\Http\Controllers\Resources\ArticleController::class);
    Route::patch('articles/{article}/restore', \App\Http\Controllers\Resources\ArticleController::class . '@restore')->name('articles.restore');
    Route::delete('articles/{article}/forceDelete', \App\Http\Controllers\Resources\ArticleController::class . '@forceDelete')->name('articles.forceDelete');

    Route::post('articleImages', \App\Http\Controllers\Resources\ArticleImageController::class . '@store')->name('articleImages.store');

    Route::get('comments', \App\Http\Controllers\Resources\CommentController::class . '@index')->name('comments.index');
    Route::get('comments/{comment}', \App\Http\Controllers\Resources\CommentController::class . '@show')->name('comments.show');
    Route::put('comments/{comment}', \App\Http\Controllers\Resources\CommentController::class . '@update')->name('comments.update');
    Route::delete('comments/{comment}', \App\Http\Controllers\Resources\CommentController::class . '@destroy')->name('comments.destroy');
    Route::patch('comments/{comment}/restore', \App\Http\Controllers\Resources\CommentController::class . '@restore')->name('comments.restore');
    Route::delete('comments/{comment}/forceDelete', \App\Http\Controllers\Resources\CommentController::class . '@forceDelete')->name('comments.forceDelete');

    Route::get('configs', \App\Http\Controllers\Resources\ConfigController::class . '@index')->name('configs.index');
    Route::get('configs/{config}', \App\Http\Controllers\Resources\ConfigController::class . '@show')->name('configs.show');
    Route::put('configs/{config}', \App\Http\Controllers\Resources\ConfigController::class . '@update')->name('configs.update');
    Route::post('configs/uploadQqQunOrCode', \App\Http\Controllers\Resources\ConfigController::class . '@uploadQqQunOrCode')->name('configs.uploadQqQunOrCode');

    Route::apiResource('friendshipLinks', \App\Http\Controllers\Resources\FriendshipLinkController::class);
    Route::patch('friendshipLinks/{friendshipLink}/restore', \App\Http\Controllers\Resources\FriendshipLinkController::class . '@restore')->name('friendshipLinks.restore');
    Route::delete('friendshipLinks/{friendshipLink}/forceDelete', \App\Http\Controllers\Resources\FriendshipLinkController::class . '@forceDelete')->name('friendshipLinks.forceDelete');

    Route::apiResource('openSources', \App\Http\Controllers\Resources\OpenSourceController::class);
    Route::patch('openSources/{openSource}/restore', \App\Http\Controllers\Resources\OpenSourceController::class . '@restore')->name('openSources.restore');
    Route::delete('openSources/{openSource}/forceDelete', \App\Http\Controllers\Resources\OpenSourceController::class . '@forceDelete')->name('openSources.forceDelete');

    Route::apiResource('navs', \App\Http\Controllers\Resources\NavController::class);
    Route::patch('navs/{nav}/restore', \App\Http\Controllers\Resources\NavController::class . '@restore')->name('navs.restore');
    Route::delete('navs/{nav}/forceDelete', \App\Http\Controllers\Resources\NavController::class . '@forceDelete')->name('navs.forceDelete');

    Route::apiResource('notes', \App\Http\Controllers\Resources\NoteController::class);
    Route::patch('notes/{note}/restore', \App\Http\Controllers\Resources\NoteController::class . '@restore')->name('notes.restore');
    Route::delete('notes/{note}/forceDelete', \App\Http\Controllers\Resources\NoteController::class . '@forceDelete')->name('notes.forceDelete');

    Route::apiResource('sites', \App\Http\Controllers\Resources\SiteController::class);
    Route::patch('sites/{site}/restore', \App\Http\Controllers\Resources\SiteController::class . '@restore')->name('sites.restore');
    Route::delete('sites/{site}/forceDelete', \App\Http\Controllers\Resources\SiteController::class . '@forceDelete')->name('sites.forceDelete');

    Route::apiResource('socialiteClients', \App\Http\Controllers\Resources\SocialiteClientController::class);

    Route::apiResource('socialiteUsers', \App\Http\Controllers\Resources\SocialiteUserController::class);
    Route::patch('socialiteUsers/{socialiteUser}/restore', \App\Http\Controllers\Resources\SocialiteUserController::class . '@restore')->name('socialiteUsers.restore');
    Route::delete('socialiteUsers/{socialiteUser}/forceDelete', \App\Http\Controllers\Resources\SocialiteUserController::class . '@forceDelete')->name('socialiteUsers.forceDelete');

    Route::apiResource('users', \App\Http\Controllers\Resources\UserController::class);
    Route::patch('users/{user}/restore', \App\Http\Controllers\Resources\UserController::class . '@restore')->name('users.restore');
    Route::delete('users/{user}/forceDelete', \App\Http\Controllers\Resources\UserController::class . '@forceDelete')->name('users.forceDelete');
});
