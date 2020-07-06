<?php

namespace App\Observers;

use Artisan;

class NavObserver extends BaseObserver
{
    public function created($model)
    {
        parent::created($model);

        Artisan::queue('bjyblog:generate-sitemap');
    }

    public function deleted($model)
    {
        parent::deleted($model);

        if (! $model->isForceDeleting()) {
            Artisan::queue('bjyblog:generate-sitemap');
        }
    }
}
