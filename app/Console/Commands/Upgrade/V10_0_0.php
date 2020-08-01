<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V10_0_0 extends Command
{
    protected $signature   = 'upgrade:v10.0.0';
    protected $description = 'Upgrade to v10.0.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        DB::table('configs')->insertOrIgnore([
            'id'         => 199,
            'name'       => 'bjyblog.theme',
            'value'      => 'blueberry',
            'created_at' => '2020-05-12 23:06:00',
            'updated_at' => '2020-05-12 23:06:00',
            'deleted_at' => null,
        ]);

        return 0;
    }
}
