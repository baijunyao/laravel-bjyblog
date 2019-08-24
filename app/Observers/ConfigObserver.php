<?php

namespace App\Observers;

use Artisan;

class ConfigObserver extends BaseObserver
{
    public function updated($model)
    {
        parent::updated($model);

        Artisan::call('config:clear');
    }
}
