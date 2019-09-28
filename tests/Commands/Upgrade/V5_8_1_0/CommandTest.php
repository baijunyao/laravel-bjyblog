<?php

namespace Tests\Commands\Upgrade\V5_8_1_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.8.1.0');

        $this->assertDatabaseHas('configs', [
            'id'    => 164,
            'value' => '[]',
        ]);
    }
}
