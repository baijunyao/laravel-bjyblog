<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V8_0_0 extends Command
{
    protected $signature   = 'upgrade:v8.0.0';
    protected $description = 'Upgrade to v8.0.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        DB::table('configs')->insert([
            [
                'id'         => 196,
                'name'       => 'bjyblog.licenses.allow_adaptation',
                'value'      => '-nd',
                'created_at' => '2020-03-31 23:06:00',
                'updated_at' => '2020-03-31 23:06:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 197,
                'name'       => 'bjyblog.licenses.allow_commercial',
                'value'      => '-nc',
                'created_at' => '2020-03-31 23:06:00',
                'updated_at' => '2020-03-31 23:06:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 198,
                'name'       => 'bjyblog.licenses.language',
                'value'      => 'en',
                'created_at' => '2020-03-31 01:06:00',
                'updated_at' => '2020-03-31 01:06:00',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
