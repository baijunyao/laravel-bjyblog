<?php

namespace App\Observers;

use Cache;

class GitProjectObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('common:gitProject');
    }
}
