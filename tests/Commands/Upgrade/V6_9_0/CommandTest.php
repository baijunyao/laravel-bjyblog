<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_9_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v6.9.0');

        static::assertDatabaseHas('configs', [
            'id'         => 194,
            'name'       => 'bjyblog.breadcrumb',
            'value'      => 'false',
            'created_at' => '2020-01-01 01:01:01',
            'updated_at' => '2020-01-01 01:01:01',
            'deleted_at' => null,
        ]);
    }
}
