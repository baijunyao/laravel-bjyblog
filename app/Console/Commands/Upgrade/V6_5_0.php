<?php

declare(strict_types=1);

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Illuminate\Console\Command;

class V6_5_0 extends Command
{
    protected $signature   = 'upgrade:v6.5.0';
    protected $description = 'Upgrade to v6.5.0';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $scoutDriver = env('SCOUT_DRIVER') === null ? 'null' : env('SCOUT_DRIVER');

        Config::insert([
            [
                'id'         => 177,
                'name'       => 'scout.driver',
                'value'      => $scoutDriver,
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 178,
                'name'       => 'scout.elasticsearch.prefix',
                'value'      => 'laravel_',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 179,
                'name'       => 'scout.elasticsearch.host',
                'value'      => '127.0.0.1',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 180,
                'name'       => 'scout.elasticsearch.port',
                'value'      => '9200',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 181,
                'name'       => 'scout.elasticsearch.scheme',
                'value'      => 'http',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 182,
                'name'       => 'scout.elasticsearch.user',
                'value'      => 'null',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 183,
                'name'       => 'scout.elasticsearch.pass',
                'value'      => 'null',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 184,
                'name'       => 'scout.elasticsearch.analyzer',
                'value'      => 'ik_max_word',
                'created_at' => '2019-11-19 22:45:00',
                'updated_at' => '2019-11-19 22:45:00',
                'deleted_at' => null,
            ],
        ]);

        return 0;
    }
}
