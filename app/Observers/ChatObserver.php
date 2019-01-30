<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Category;
use Cache;

class ChatObserver extends BaseObserver
{
    protected function clearCache()
    {
        // 更新分类缓存
        Cache::forget('common:chat');
    }
}
