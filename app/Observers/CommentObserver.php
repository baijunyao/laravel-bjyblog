<?php

namespace App\Observers;

use Cache;

class CommentObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('common:newComment');
    }
}
