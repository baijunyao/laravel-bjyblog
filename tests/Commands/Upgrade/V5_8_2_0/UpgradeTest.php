<?php

namespace Tests\Commands\Upgrade\V5_8_2_0;

use App\Models\Config;
use DB;

class UpgradeTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testUpgrade()
    {
        $config_ids = [
            120, 126, 133, 134, 139, 140,
        ];
        static::assertEquals(6, Config::whereIn('id', $config_ids)->count());

        $this->artisan('bjyblog:update')->assertExitCode(0);

        static::assertEquals(0, Config::whereIn('id', $config_ids)->count());
        static::assertEquals(3, DB::table('socialite_clients')->whereBetween('id', [1, 3])->count());
    }
}
