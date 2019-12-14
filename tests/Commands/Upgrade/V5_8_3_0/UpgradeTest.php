<?php

namespace Tests\Commands\Upgrade\V5_8_3_0;

class UpgradeTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testUpgrade()
    {
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

        $this->artisan('bjyblog:update')->assertExitCode(0);

        foreach ($oauthClients as $oauthClient) {
            $this->assertDatabaseHas('socialite_clients', $oauthClient);
        }
    }
}
