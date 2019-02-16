<?php

namespace App\Listeners;

use App\Events\SiteAudit;
use App\Models\OauthUser;
use App\Models\Site;
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
        $siteId      = $event->siteId;
        $oauthUserId = Site::where('id', $siteId)->value('oauth_user_id');
        if (empty($oauthUserId)) {
            return false;
        }
        // 获取第三方登录用户
        $oauthUser = OauthUser::find($oauthUserId);
        // 如果邮箱为空则不发通知
        if (empty($oauthUser->email)) {
            return false;
        }
        $oauthUser->notify(new SiteAuditNotification());
    }
}
