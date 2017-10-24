<?php

namespace App\Observers;

use Artisan;

class CacheClearObserver
{
    /**
     * 监听创建事件
     */
    public function created()
    {
        Artisan::call('cache:clear');
    }

    /**
     * 监听更新事件
     */
    public function updated()
    {
        Artisan::call('cache:clear');
    }

    /**
     * 监听恢复事件
     */
    public function deleted()
    {
        Artisan::call('cache:clear');
    }

    public function restored()
    {
        Artisan::call('cache:clear');
    }

}