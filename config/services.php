<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'baidu' => [
        'appid' => env('BAIDU_APPID'),
        'appkey' => env('BAIDU_APPKEY'),
        'secret' => env('BAIDU_SECRET')
    ],

    'weibo' => [
        'client_id' => env('WEIBO_KEY'),
        'client_secret' => env('WEIBO_SECRET'),
        'redirect' => env('APP_URL').'/auth/oauth/handleProviderCallback/weibo'
    ],

    'qq' => [
        'client_id' => env('QQ_KEY'),
        'client_secret' => env('QQ_SECRET'),
        'redirect' => env('APP_URL').'/auth/oauth/handleProviderCallback/qq'
    ],

    'github' => [
        'client_id' => env('GITHUB_KEY'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('APP_URL').'/auth/oauth/handleProviderCallback/github'
    ],

    'google' => [
        'client_id' => env('GOOGLE_KEY'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('APP_URL').'/auth/oauth/handleProviderCallback/google'
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_KEY'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect' => env('APP_URL').'/auth/oauth/handleProviderCallback/facebook'
    ],

    'vkontakte' => [
        'client_id' => env('VKONTAKTE_KEY'),
        'client_secret' => env('VKONTAKTE_SECRET'),
        'redirect' => env('APP_URL').'/auth/oauth/handleProviderCallback/vkontakte'
    ],

    'tencentcloud' => [
        'secret_id' => env('TENCENTCLOUD_SECRET_ID'),
        'secret_key' => env('TENCENTCLOUD_SECRET_KEY'),
        'instance_id' => env('TENCENTCLOUD_INSTANCE_ID'),
        'region' => env('TENCENTCLOUD_REGION'),
        'ssh_key_id' => env('TENCENTCLOUD_SSH_KEY_ID'),
    ],
];
