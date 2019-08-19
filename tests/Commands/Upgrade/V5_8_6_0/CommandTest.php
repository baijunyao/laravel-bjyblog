<?php

namespace Tests\Commands\Upgrade\V5_8_6_0;

use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $tablePrefix        = DB::getTablePrefix();
        $socialiteUserSql   = "SHOW TABLES LIKE '{$tablePrefix}socialite_users'";
        $socialiteClientSql = "SHOW TABLES LIKE '{$tablePrefix}socialite_clients'";
        static::assertEmpty(DB::select($socialiteUserSql));
        static::assertEmpty(DB::select($socialiteClientSql));

        $oauthUsersSql   = "SHOW TABLES LIKE '{$tablePrefix}oauth_users'";
        $oauthClientsSql = "SHOW TABLES LIKE '{$tablePrefix}oauth_clients'";
        static::assertNotEmpty(DB::select($oauthUsersSql));
        static::assertNotEmpty(DB::select($oauthClientsSql));

        $commentColumns   = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}comments"))->pluck('Field');
        $siteColumns      = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}sites"))->pluck('Field');
        $oauthUserColumns = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}oauth_users"))->pluck('Field');
        static::assertTrue($commentColumns->contains('oauth_user_id'));
        static::assertTrue($siteColumns->contains('oauth_user_id'));
        static::assertTrue($oauthUserColumns->contains('oauth_client_id'));
        static::assertNotTrue($commentColumns->contains('socialite_user_id'));
        static::assertNotTrue($siteColumns->contains('socialite_user_id'));
        static::assertNotTrue($oauthUserColumns->contains('socialite_client_id'));

        Artisan::call('upgrade:v5.8.6.0');

        static::assertEmpty(DB::select($oauthUsersSql));
        static::assertEmpty(DB::select($oauthClientsSql));

        static::assertNotEmpty(DB::select($socialiteUserSql));
        static::assertNotEmpty(DB::select($socialiteClientSql));

        $commentColumns        = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}comments"))->pluck('Field');
        $siteColumns           = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}sites"))->pluck('Field');
        $socialiteUsersColumns = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}socialite_users"))->pluck('Field');
        static::assertNotTrue($commentColumns->contains('oauth_user_id'));
        static::assertNotTrue($siteColumns->contains('oauth_user_id'));
        static::assertNotTrue($socialiteUsersColumns->contains('oauth_client_id'));
        static::assertTrue($commentColumns->contains('socialite_user_id'));
        static::assertTrue($siteColumns->contains('socialite_user_id'));
        static::assertTrue($socialiteUsersColumns->contains('socialite_client_id'));
    }
}
