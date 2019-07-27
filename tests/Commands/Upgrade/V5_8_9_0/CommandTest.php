<?php

namespace Tests\Commands\Upgrade\V5_8_9_0;

use Illuminate\Support\Facades\Artisan;
use App\Models\Console;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.8.9.0');

        $names = [
            'App\Console\Commands\Upgrade\V5_5_4_1',
            'App\Console\Commands\Upgrade\V5_5_4_3'
        ];
        $this->assertEquals(0, Console::whereIn('name', $names)->count());

        $this->assertDatabaseHas('consoles', [
            'id'         => 1,
            'name'       => 'App\Console\Commands\Upgrade\V5_5_5_0',
        ]);
    }
}
