<?php

namespace Tests\Commands\Upgrade\V5_8_8_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.8.8.0');

        $this->assertDatabaseHas('socialite_clients', [
            'id'            => 6,
            'name'          => 'vkontakte',
            'icon'          => 'vk',
            'client_id'     => '',
            'client_secret' => '',
            'created_at'    => '2019-07-01 23:26:38',
            'updated_at'    => '2019-07-01 23:26:38',
            'deleted_at'    => null,
        ]);
    }
}
