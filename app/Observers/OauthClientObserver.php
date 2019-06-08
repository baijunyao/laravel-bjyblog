<?php

namespace App\Observers;

use Cache;

class OauthClientObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('oauthClients');
    }
}
