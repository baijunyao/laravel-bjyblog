<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use Artisan;
use File;
use Illuminate\Console\Command;

class V11_0_0 extends Command
{
    protected $signature   = 'upgrade:v11.0.0';
    protected $description = 'Upgrade to v11.0.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (File::isDirectory(storage_path('app/public/uploads'))) {
            File::moveDirectory(storage_path('app/public/uploads'), storage_path('app/public/uploads.bak'));
        }

        if (File::isDirectory(public_path('uploads')) && !is_link(public_path('uploads'))) {
            File::moveDirectory(public_path('uploads'), storage_path('app/public/uploads'), true);

            Artisan::call('storage:link --relative');
        }
    }
}
