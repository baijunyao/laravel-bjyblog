<?php

namespace App\Observers;

use Artisan;

class ConfigObserver extends BaseObserver
{
    /**
     * @param \App\Models\Config $model
     */
    public function updated($model)
    {
        parent::updated($model);

        Artisan::call('config:clear');
    }
}
