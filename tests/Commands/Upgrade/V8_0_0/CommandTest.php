<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V8_0_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v8.0.0');

        $configs = [
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
        ];

        foreach ($configs as $config) {
            static::assertDatabaseHas('configs', $config);
        }
    }
}
