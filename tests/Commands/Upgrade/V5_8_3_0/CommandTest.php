<?php

namespace Tests\Commands\Upgrade\V5_8_3_0;

use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $tablePrefix   = DB::getTablePrefix();
        $columns       = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}oauth_clients"))->pluck('Field');
        $assertColumns = ['client_id_config', 'client_secret_config'];

        $oauthClients = [
            [
                'id'            => 4,
                'name'          => 'google',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
            [
                'id'            => 5,
                'name'          => 'facebook',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
        ];

        foreach ($assertColumns as $assertColumn) {
            static::assertTrue($columns->contains($assertColumn));
        }

        foreach ($oauthClients as $oauthClient) {
            $this->assertDatabaseMissing('oauth_clients', $oauthClient);
        }

        Artisan::call('upgrade:v5.8.3.0');

        $columns = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}oauth_clients"))->pluck('Field');

        foreach ($assertColumns as $assertColumn) {
            static::assertFalse($columns->contains($assertColumn));
        }

        foreach ($oauthClients as $oauthClient) {
            $this->assertDatabaseHas('oauth_clients', $oauthClient);
        }
    }
}
