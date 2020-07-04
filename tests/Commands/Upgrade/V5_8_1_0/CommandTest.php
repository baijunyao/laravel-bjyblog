<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_8_1_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v5.8.1.0');

        $this->assertDatabaseHas('configs', [
            'id'    => 164,
            'value' => '[]',
        ]);
    }
}
