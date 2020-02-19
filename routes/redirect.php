<?php

declare(strict_types=1);

// oauth to socialite
Route::get('auth/oauth/redirectToProvider/{service}', 'RedirectController@authOauthRedirectToProvider');
Route::get('auth/oauth/handleProviderCallback/{service}', 'RedirectController@handleProviderCallback');
Route::get('auth/oauth/logout', 'RedirectController@logout');

Route::get('chat', 'RedirectController@note')->name('home.chat');
Route::get('git', 'RedirectController@openSource')->name('home.git');
