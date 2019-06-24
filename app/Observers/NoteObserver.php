<?php

namespace App\Observers;

use Cache;

class NoteObserver extends BaseObserver
{
    protected function clearCache()
    {
        Cache::forget('common:note');
    }
}
