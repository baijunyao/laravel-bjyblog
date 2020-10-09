<?php

declare(strict_types=1);

// oauth to socialite
Route::get('auth/oauth/redirectToProvider/{service}', App\Http\Controllers\RedirectController::class . '@authOauthRedirectToProvider');
Route::get('auth/oauth/handleProviderCallback/{service}', App\Http\Controllers\RedirectController::class . '@handleProviderCallback');
Route::get('auth/oauth/logout', \App\Http\Controllers\RedirectController::class . '@logout');

Route::get('chat', \App\Http\Controllers\RedirectController::class . '@note')->name('home.chat');
Route::get('git', \App\Http\Controllers\RedirectController::class . '@openSource')->name('home.git');

Route::get('login', \App\Http\Controllers\RedirectController::class . '@login')->name('login');
