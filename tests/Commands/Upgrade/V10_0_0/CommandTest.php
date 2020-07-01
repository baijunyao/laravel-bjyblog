<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V10_0_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $config = [
            'id'         => 199,
            'name'       => 'bjyblog.theme',
            'value'      => 'blueberry',
            'created_at' => '2020-05-12 23:06:00',
            'updated_at' => '2020-05-12 23:06:00',
            'deleted_at' => null,
        ];

        static::assertDatabaseMissing('configs', $config);

        $this->artisan('upgrade:v10.0.0');

        static::assertDatabaseHas('configs', $config);
    }
}
