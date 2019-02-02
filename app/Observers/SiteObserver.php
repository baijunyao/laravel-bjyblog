<?php

namespace App\Observers;

use Cache;
use App\Events\SiteAudit;

class SiteObserver extends BaseObserver
{
    public function updated($site)
    {
        // restore() triggering both restored() and updated()
        if(! $site->isDirty('deleted_at')){
            if ($site->isDirty('audit') && $site->audit === 1) {
                event(new SiteAudit($site->id));
            }
            flash_success('修改成功');
        }

        $this->clearCache();
    }

    protected function clearCache()
    {
        Cache::forget('home:site');
    }
}
