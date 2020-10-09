<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V5_8_11_0 extends Command
{
    protected $signature = 'upgrade:v5.8.11.0';

    protected $description = 'upgrade to v5.8.11.0';

    public function handle(): int
    {
        DB::table('configs')->insert([
            'id'         => 172,
            'name'       => 'bjyblog.cdn_domain',
            'value'      => '',
            'created_at' => '2019-08-05 22:15:00',
            'updated_at' => '2019-08-05 22:15:00',
            'deleted_at' => null,
        ]);

        return 0;
    }
}
