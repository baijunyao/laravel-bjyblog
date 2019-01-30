<?php

namespace App\Observers;

use Cache;

class FriendshipLinkObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('common:friendshipLink');
    }
}
