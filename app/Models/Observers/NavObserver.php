<?php

namespace App\Models\Observers;

use Artisan;

class NavObserver extends BaseObserver
{
    /**
     * @param \App\Models\Nav $model
     *
     * @return void
     */
    public function created($model)
    {
        Artisan::queue('bjyblog:generate-sitemap');
    }

    /**
     * @param \App\Models\Nav $model
     *
     * @return void
     */
    public function deleted($model)
    {
        if (! $model->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
