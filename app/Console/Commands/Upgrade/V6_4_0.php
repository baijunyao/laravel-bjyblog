<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;

class V6_4_0 extends Command
{
    protected $signature   = 'upgrade:v6.4.0';
    protected $description = 'Upgrade to v6.4.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $envContent = file_get_contents(base_path('.env'));
        $env        = str_replace('ELASTICSEARCH_HOSTS', 'ELASTICSEARCH_HOST', $envContent);
        file_put_contents(base_path('.env'), $env);
    }
}
