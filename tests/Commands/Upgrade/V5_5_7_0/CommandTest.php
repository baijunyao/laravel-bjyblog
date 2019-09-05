<?php

namespace Tests\Commands\Upgrade\V5_5_7_0;

use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertEquals(DB::table('configs')->where('id', 158)->count(), 0);

        Artisan::call('upgrade:v5.5.7.0');

        static::assertEquals(DB::table('configs')->where('id', 158)->count(), 1);
    }
}
