<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V6_9_0 extends Command
{
    protected $signature   = 'upgrade:v6.9.0';
    protected $description = 'Upgrade to v6.9.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        Config::insert([
            [
                'id'         => 194,
                'name'       => 'bjyblog.breadcrumb',
                'value'      => 'false',
                'created_at' => '2020-01-01 01:01:01',
                'updated_at' => '2020-01-01 01:01:01',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
