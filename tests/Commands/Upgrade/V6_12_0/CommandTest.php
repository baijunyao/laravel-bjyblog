<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_12_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v6.12.0');

        static::assertDatabaseHas('configs', [
            'id'         => 195,
            'name'       => 'app.timezone',
            'value'      => 'PRC',
            'created_at' => '2020-01-27 01:01:01',
            'updated_at' => '2020-01-27 01:01:01',
            'deleted_at' => null,
        ]);
    }
}
