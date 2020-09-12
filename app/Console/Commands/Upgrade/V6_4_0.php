<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use File;
use Illuminate\Console\Command;

class V6_4_0 extends Command
{
    protected $signature   = 'upgrade:v6.4.0';
    protected $description = 'Upgrade to v6.4.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $envPath = base_path('.env');

        File::put($envPath, str_replace('ELASTICSEARCH_HOSTS', 'ELASTICSEARCH_HOST', File::get($envPath)));

        return 0;
    }
}
