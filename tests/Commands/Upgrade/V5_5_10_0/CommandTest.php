<?php

namespace Tests\Commands\Upgrade\V5_5_10_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.5.10.0');

        $this->assertDatabaseHas('consoles', [
            'id'         => 5,
            'name'       => 'App\Console\Commands\Upgrade\V5_5_8_0',
        ]);

        $this->assertDatabaseHas('consoles', [
            'id'         => 6,
            'name'       => 'App\Console\Commands\Upgrade\V5_5_9_0',
        ]);
    }
}
