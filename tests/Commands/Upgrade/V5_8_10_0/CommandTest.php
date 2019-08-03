<?php

namespace Tests\Commands\Upgrade\V5_8_10_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.8.10.0');

        $this->assertDatabaseHas('oauth_clients', [
            'id'                     => 1,
            'user_id'                => null,
            'name'                   => config('app.name') . ' Password Grant Client',
            'secret'                 => '',
            'redirect'               => 'http://localhost',
            'personal_access_client' => 0,
            'password_client'        => 1,
            'revoked'                => 0,
            'created_at'             => '2019-06-29 20:35:12',
            'updated_at'             => '2019-06-29 20:35:12',
        ]);

        static::assertFileExists(storage_path('oauth-private.key'));
        static::assertFileExists(storage_path('oauth-public.key'));
    }
}
