<?php

return [
    // 博客版本
    'version' => 'v14.1.16',
    'branch' => env('DEPLOY_BRANCH', 'master'),
    /**
     * 以下配置项会在 @see \App\Providers\ComposerServiceProvider::boot() 中被覆盖
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
        'select_plugin' => '',
        'jssocials_config' => '',
        'sharejs_config' => ''
    ],
    'logo_with_php_tag' => '',
    'cdn_domain' => '',
    'comment_audit' => '',
    'social_links' => [
        'github' => '',
        'gitlab' => '',
        'gitee' => '',
        'twitter' => '',
        'facebook' => '',
        'vkontakte' => '',
        'zhihu' => '',
        'weibo' => '',
        'upyun' => '',
    ],
    'link_target' => '',
    'breadcrumb' => '',
    'licenses' => [
        'allow_adaptation' => '',
        'allow_commercial' => '',
        'language' => '',
    ],
    'theme' => '',
    'upload_disks' => '',
];
