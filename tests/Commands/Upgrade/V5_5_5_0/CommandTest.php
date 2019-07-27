<?php

namespace Tests\Commands\Upgrade\V5_5_5_0;

use App\Models\Config;
use App\Models\Nav;
use Illuminate\Support\Facades\Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.5.5.0');

        $this->assertDatabaseHas('configs', [
            'id'    => 156,
            'name'  => 'mail.encryption',
            'value' => 'ssl',
        ]);

        $this->assertDatabaseHas('configs', [
            'id'    => 157,
            'name'  => 'mail.from.address',
            'value' => '',
        ]);

        static::assertEquals(2, Nav::count());
        static::assertEquals(2, Config::whereIn('id', [101, 155])->count());
        static::assertEquals(0, Config::where('name', 'like', 'email.%')->count());
    }
}
