<?php

namespace App\Observers;

use Cache;

class ChatObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('common:chat');
    }
}
