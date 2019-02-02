<?php

namespace App\Observers;

use Cache;

class NavObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('common:nav');
    }
}
