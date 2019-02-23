<?php

return [
    // 博客版本
    'version' => 'v5.5.10.7',
    'branch' => env('DEPLOY_BRANCH', 'master'),
    /**
     * 以下配置项会在 @see \App\Providers\AppServiceProvider::boot() 中被覆盖
     * 请勿直接修改本配置项文件
     */
    'web_name' => '',
    'head' => [
        'title' => '',
        'keywords' => '',
        'description' => ''
    ],
    'water' => [
        'text' => '',
        'size' => '',
        'color' => '',
    ],
    'icp' => '',
    'admin_email' => '',
    'notification_email' => '',
    'statistics' => '',
    'author' => '',
    'baidu_site_url' => '',
    'copyright_word' => '',
    'alt_word' => '',
    'qq_qun' => [
        'article_id' => '',
        'number' => '',
        'code' => '',
        'or_code' => '',
    ],

];
