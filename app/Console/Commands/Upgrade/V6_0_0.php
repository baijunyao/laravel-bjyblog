<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use File;
use Illuminate\Console\Command;

class V6_0_0 extends Command
{
    protected $signature = 'upgrade:v6.0.0';

    protected $description = 'upgrade to v6.0.0';

    public function handle(): int
    {
        DB::table('migrations')->insert([
            'migration' => '2019_08_19_000000_create_failed_jobs_table',
            'batch'     => 1,
        ]);

        $envPath = base_path('.env');

        File::put($envPath, str_replace('SCOUT_DRIVER=tntsearch', 'SCOUT_DRIVER=null', File::get($envPath)));

        return 0;
    }
}
