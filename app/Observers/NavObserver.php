<?php

namespace App\Observers;

use Artisan;

class NavObserver extends BaseObserver
{
    /**
     * @param \App\Models\Nav $model
     */
    public function created($model)
    {
        parent::created($model);

        Artisan::queue('bjyblog:generate-sitemap');
    }

    /**
     * @param \App\Models\Nav $model
     */
    public function deleted($model)
    {
        parent::deleted($model);

        if (! $model->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
