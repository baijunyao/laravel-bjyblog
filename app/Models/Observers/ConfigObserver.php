<?php

namespace App\Models\Observers;

use Artisan;

class ConfigObserver extends BaseObserver
{
    /**
     * @param \App\Models\Config $model
     *
     * @return void
     */
    public function updated($model)
    {
        parent::updated($model);

        Artisan::call('config:clear');
    }
}
