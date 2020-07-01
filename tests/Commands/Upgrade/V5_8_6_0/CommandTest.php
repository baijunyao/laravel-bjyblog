<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_8_6_0;

use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $tablePrefix        = DB::getTablePrefix();
        $commentColumns     = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}comments"))->pluck('Field');
        $siteColumns        = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}sites"))->pluck('Field');
        $oauthUserColumns   = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}oauth_users"))->pluck('Field');
        static::assertTrue($commentColumns->contains('oauth_user_id'));
        static::assertTrue($siteColumns->contains('oauth_user_id'));
        static::assertTrue($oauthUserColumns->contains('oauth_client_id'));
        static::assertNotTrue($commentColumns->contains('socialite_user_id'));
        static::assertNotTrue($siteColumns->contains('socialite_user_id'));
        static::assertNotTrue($oauthUserColumns->contains('socialite_client_id'));

        $this->artisan('upgrade:v5.8.6.0');

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
