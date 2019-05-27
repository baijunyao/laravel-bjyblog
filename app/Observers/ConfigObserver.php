<?php

namespace App\Observers;

use Cache;

class ConfigObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('config');
    }
}
