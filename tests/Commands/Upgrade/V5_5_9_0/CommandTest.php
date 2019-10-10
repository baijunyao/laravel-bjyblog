<?php

namespace Tests\Commands\Upgrade\V5_5_9_0;

use App\Models\Config;
use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.5.9.0');

        static::assertEquals(7, Config::whereBetween('id', [159, 165])->count());
    }
}
