<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V6_12_0 extends Command
{
    protected $signature   = 'upgrade:v6.12.0';
    protected $description = 'Upgrade to v6.12.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        DB::table('configs')->insert([
            'id'         => 195,
            'name'       => 'app.timezone',
            'value'      => 'PRC',
            'created_at' => '2020-01-27 01:01:01',
            'updated_at' => '2020-01-27 01:01:01',
            'deleted_at' => null,
        ]);

        return 0;
    }
}
