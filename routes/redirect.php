<?php

declare(strict_types=1);

// oauth to socialite
Route::get('auth/oauth/redirectToProvider/{service}', App\Http\Controllers\RedirectController::class . '@authOauthRedirectToProvider');
Route::get('auth/oauth/handleProviderCallback/{service}', App\Http\Controllers\RedirectController::class . '@handleProviderCallback');
Route::get('login', \App\Http\Controllers\RedirectController::class . '@login')->name('login');

Route::redirect('/category/{category}/{slug?}', '/categories/{category}/{slug?}', 301);
Route::redirect('/tag/{tag}/{slug?}', '/tags/{tag}/{slug?}', 301);
Route::redirect('/article/{article}/{slug?}', '/articles/{article}/{slug?}', 301);
Route::redirect('/comment', '/comments', 301);
Route::redirect('/like/destroy', '/likes/destroy', 301);
Route::redirect('/chat', '/notes', 301);
Route::redirect('/note', '/notes', 301);
Route::redirect('/git', '/openSources', 301);
Route::redirect('/openSource', '/openSources', 301);
Route::redirect('/site', '/sites', 301);
Route::redirect('/socialiteUser/{socialiteUser}', '/socialiteUsers/{socialiteUser}', 301);
Route::redirect('/feed', '/feeds', 301);
Route::redirect('/ant', '/admin', 301);
