<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class V6_13_0 extends Command
{
    protected $signature   = 'upgrade:v6.13.0';
    protected $description = 'Upgrade to v6.13.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Schema::rename('git_projects', 'open_sources');
    }
}
