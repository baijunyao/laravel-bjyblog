<?php

namespace Tests\Commands\Upgrade\V6_5_0;

use App\Models\Config;
use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertEquals(0, Config::whereBetween('id', [177, 184])->count());

        Artisan::call('upgrade:v6.5.0');

        static::assertEquals(8, Config::whereBetween('id', [177, 184])->count());
    }
}
