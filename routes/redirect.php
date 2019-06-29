<?php

// oauth to socialite
Route::get('auth/oauth/redirectToProvider/{service}', 'RedirectController@authOauthRedirectToProvider');
Route::get('auth/oauth/handleProviderCallback/{service}', 'RedirectController@handleProviderCallback');
Route::get('auth/oauth/logout', 'RedirectController@logout');

// chat to note
Route::get('chat', 'RedirectController@note');
