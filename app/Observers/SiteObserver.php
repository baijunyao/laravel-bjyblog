<?php

namespace App\Observers;

use App\Notifications\SiteAudit;

class SiteObserver extends BaseObserver
{
    /**
     * @param \App\Models\Site $site
     */
    public function updated($site)
    {
        // restore() triggering both restored() and updated()
        if(! $site->isDirty('deleted_at')){
            // $site->audit is string
            if ($site->isDirty('audit') && intval($site->audit) === 1) {
                $site->socialiteUser->notify(new SiteAudit());
            }

            flash_success('修改成功');
        }
    }
}
