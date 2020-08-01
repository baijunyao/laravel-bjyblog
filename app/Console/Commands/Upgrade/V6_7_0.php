<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V6_7_0 extends Command
{
    protected $signature   = 'upgrade:v6.7.0';
    protected $description = 'Upgrade to v6.7.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        Config::insert([
            [
                'id'         => 186,
                'name'       => 'scout.algolia.id',
                'value'      => '',
                'created_at' => '2019-12-16 22:45:00',
                'updated_at' => '2019-12-16 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 187,
                'name'       => 'scout.algolia.secret',
                'value'      => '',
                'created_at' => '2019-12-16 10:49:00',
                'updated_at' => '2019-12-16 10:49:00',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
