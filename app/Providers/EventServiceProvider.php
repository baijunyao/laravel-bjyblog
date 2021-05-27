<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<string,array<int,string>>
     */
    protected $listen = [
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Weibo\WeiboExtendSocialite::class,
            \SocialiteProviders\QQ\QqExtendSocialite::class,
            \SocialiteProviders\VKontakte\VKontakteExtendSocialite::class,
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
