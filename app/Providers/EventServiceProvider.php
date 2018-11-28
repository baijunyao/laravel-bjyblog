<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'SocialiteProviders\Manager\SocialiteWasCalled' => [
            'SocialiteProviders\Weibo\WeiboExtendSocialite@handle',
            'SocialiteProviders\QQ\QqExtendSocialite@handle',
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

        //
    }
}
