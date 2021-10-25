<?php

namespace App\Models\Observers;

use App\Models\Config;
use Artisan;

class ConfigObserver extends BaseObserver
{
    public function updated(Config $config): void
    {
        Artisan::call('config:clear');
    }
}
