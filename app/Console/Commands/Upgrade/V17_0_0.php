<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V17_0_0 extends Command
{
    public const CONFIG = [
        [
            'id'         => 205,
            'name'       => 'services.tencent_cloud.secret_id',
            'value'      => '',
            'created_at' => '2022-06-15 20:06:00',
            'updated_at' => '2022-06-15 20:06:00',
            'deleted_at' => null,
        ],
        [
            'id'         => 206,
            'name'       => 'services.tencent_cloud.secret_key',
            'value'      => '',
            'created_at' => '2022-06-15 20:06:00',
            'updated_at' => '2022-06-15 20:06:00',
            'deleted_at' => null,
        ],
        [
            'id'         => 207,
            'name'       => 'services.tencent_cloud.region',
            'value'      => '',
            'created_at' => '2022-06-15 20:06:00',
            'updated_at' => '2022-06-15 20:06:00',
            'deleted_at' => null,
        ],
        [
            'id'         => 208,
            'name'       => 'services.tencent_cloud.project_id',
            'value'      => '',
            'created_at' => '2022-06-15 20:06:00',
            'updated_at' => '2022-06-15 20:06:00',
            'deleted_at' => null,
        ],
    ];
    protected $signature   = 'upgrade:v17.0.0';
    protected $description = 'Upgrade to v17.0.0';

    public function handle(): int
    {
        foreach (self::CONFIG as $config) {
            DB::table('configs')->insertOrIgnore($config);
        }

        return 0;
    }
}
