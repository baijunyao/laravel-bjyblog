<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_8_3_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $oauthClients = [
            [
                'id'            => 4,
                'name'          => 'google',
                'client_id'     => '',
                'client_secret' => '',
            ],
            [
                'id'            => 5,
                'name'          => 'facebook',
                'client_id'     => '',
                'client_secret' => '',
            ],
        ];

        $this->artisan('upgrade:v5.8.3.0');

        foreach ($oauthClients as $oauthClient) {
            $this->assertDatabaseHas('socialite_clients', $oauthClient);
        }

        $this->assertDatabaseHas('configs', [
            'id'    => 164,
            'value' => '[]',
        ]);
    }
}
