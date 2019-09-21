<?php

namespace Tests\Commands\Upgrade\V5_8_2_0;

use App\Models\Config;
use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $config_ids = [
            120, 126, 133, 134, 139, 140,
        ];
        static::assertEquals(6, Config::whereIn('id', $config_ids)->count());
        static::assertEquals(0, DB::table('oauth_clients')->count());
        static::assertTrue(column_in_database_table('oauth_users', 'type'));
        static::assertFalse(column_in_database_table('oauth_users', 'oauth_client_id'));

        Artisan::call('upgrade:v5.8.2.0');

        static::assertEquals(0, Config::whereIn('id', $config_ids)->count());
        static::assertEquals(3, DB::table('oauth_clients')->count());
        static::assertFalse(column_in_database_table('oauth_users', 'type'));
        static::assertTrue(column_in_database_table('oauth_users', 'oauth_client_id'));
    }
}
