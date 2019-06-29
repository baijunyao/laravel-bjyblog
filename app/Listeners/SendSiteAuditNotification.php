<?php

namespace App\Listeners;

use App\Events\SiteAudit;
use App\Models\Site;
use App\Models\SocialiteUser;
use App\Notifications\SiteAudit as SiteAuditNotification;

class SendSiteAuditNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param SiteAudit $event
     *
     * @return void
     */
    public function handle(SiteAudit $event)
    {
        // 获取推荐第三方登录的用户id
        $siteId          = $event->siteId;
        $socialiteUserId = Site::where('id', $siteId)->value('socialite_user_id');
        if (empty($socialiteUserId)) {
            return false;
        }
        // 获取第三方登录用户
        $socialiteUser = SocialiteUser::find($socialiteUserId);
        // 如果邮箱为空则不发通知
        if (empty($socialiteUser->email)) {
            return false;
        }
        $socialiteUser->notify(new SiteAuditNotification());
    }
}
