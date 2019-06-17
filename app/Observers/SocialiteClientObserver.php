<?php

namespace App\Observers;

use Cache;

class SocialiteClientObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('socialiteClients');
    }
}
