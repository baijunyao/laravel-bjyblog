<?php

namespace Tests\Commands\Upgrade\V6_11_0;

use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v6.11.0');

        $visits = DB::table('visits')
            ->where('primary_key', 'visits:articles_visits')
            ->pluck('score', 'id');

        static::assertEquals(666, $visits[1]);
        static::assertEquals(222, $visits[2]);
        static::assertEquals(333, $visits[3]);
    }
}
