<?php

namespace App\Models\Observers;

use App\Models\Site;
use App\Models\SocialiteUser;
use App\Notifications\SiteApply;
use App\Notifications\SiteAudit;
use Notification;

class SiteObserver extends BaseObserver
{
    /**
     * @param Site $site
     *
     * @return void
     */
    public function creating(Site $site)
    {
        /** @var \App\Models\SocialiteUser|null $socialiteUser */
        $socialiteUser = auth()->guard('socialite')->user();

        $site->socialite_user_id = $socialiteUser->id ?? 0;
        $site->sort              = intval(Site::orderBy('sort', 'desc')->limit(1)->value('sort')) + 1;
    }

    /**
     * @param \App\Models\Site $site
     *
     * @return void
     */
    public function created($site)
    {
        parent::created($site);

        Notification::route('mail', config('bjyblog.notification_email'))
            ->notify(new SiteApply());
    }

    /**
     * @param \App\Models\Site $site
     *
     * @return void
     */
    public function updated($site)
    {
        // restore() triggering both restored() and updated()
        if(! $site->isDirty('deleted_at')) {
            // $site->audit is string
            if ($site->isDirty('audit') && intval($site->audit) === 1) {
                assert($site->socialiteUser instanceof SocialiteUser);

                $site->socialiteUser->notify(new SiteAudit());
            }

            flash_success('修改成功');
        }
    }
}
