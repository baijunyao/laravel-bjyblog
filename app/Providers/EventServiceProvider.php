<?php

namespace App\Providers;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'Illuminate\Auth\Events\Registered' => [
        //     SendEmailVerificationNotification::class,
        // ],

        'SocialiteProviders\Manager\SocialiteWasCalled' => [
            'SocialiteProviders\Weibo\WeiboExtendSocialite@handle',
            'SocialiteProviders\QQ\QqExtendSocialite@handle',
            'SocialiteProviders\Google\GoogleExtendSocialite@handle',
            'SocialiteProviders\Facebook\FacebookExtendSocialite@handle',
        ],

        /**
         * 推荐博客审核通过
         */
        'App\Events\SiteAudit' => [
            'App\Listeners\SendSiteAuditNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
