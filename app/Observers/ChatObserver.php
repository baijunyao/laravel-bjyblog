<?php

namespace App\Observers;

use Artisan;

class ChatObserver
{
    /**
     * 监听创建事件。
     */
    public function created()
    {
        Artisan::call('cache:clear');
    }

    /**
     * 监听更新事件。
     */
    public function updated()
    {
        Artisan::call('cache:clear');
    }

    /**
     * 监听删除事件
     */
    public function deleted()
    {
        Artisan::call('cache:clear');
    }
}