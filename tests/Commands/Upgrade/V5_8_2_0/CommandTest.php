<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_8_2_0;

use DB;
use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertEquals(6, DB::table('configs')->whereIn('id', [120, 126, 133, 134, 139, 140])->count());
        static::assertTrue(Schema::hasColumn('oauth_users', 'type'));

        $this->artisan('upgrade:v5.8.2.0');

        static::assertEquals(0, DB::table('configs')->whereIn('id', [120, 126, 133, 134, 139, 140])->count());
        static::assertEquals(3, DB::table('socialite_clients')->count());
        static::assertTrue(Schema::hasColumn('oauth_users', 'oauth_client_id'));
    }
}
