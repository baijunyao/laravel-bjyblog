<?php

namespace App\Models\Observers;

use App\Models\Nav;
use Artisan;

class NavObserver extends BaseObserver
{
    public function created(Nav $nav): void
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    public function deleted(Nav $nav): void
    {
        if (! $nav->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
