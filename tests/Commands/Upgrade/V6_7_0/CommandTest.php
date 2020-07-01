<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_7_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v6.7.0');

        static::assertDatabaseHas('configs', [
            'id'         => 187,
            'name'       => 'scout.algolia.secret',
            'value'      => '',
            'created_at' => '2019-12-16 10:49:00',
            'updated_at' => '2019-12-16 10:49:00',
            'deleted_at' => null,
        ]);

        static::assertDatabaseHas('configs', [
            'id'         => 186,
            'name'       => 'scout.algolia.id',
            'value'      => '',
            'created_at' => '2019-12-16 22:45:00',
            'updated_at' => '2019-12-16 22:45:00',
            'deleted_at' => null,
        ]);
    }
}
