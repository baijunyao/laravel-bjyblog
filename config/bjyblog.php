<?php

return [
    // 博客版本
    'version' => 'v5.8.4.0',
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
    'seo' => [
        'use_slug' => ''
    ],
    'social_share' => [
        'allow_social_share' => env('ALLOW_SOCIAL_SHARE', false),
        'show_count' => env('SOCIAL_SHOW_COUNT', false),
        'show_label' => env('SOCIAL_SHOW_LABEL', false),
        'networks' => env('SOCIAL_NETWORKS', '[]'),
    ]
];
