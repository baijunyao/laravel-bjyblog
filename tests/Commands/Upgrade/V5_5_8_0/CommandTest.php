<?php

namespace Tests\Commands\Upgrade\V5_5_8_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v5.5.8.0');

        $this->assertDatabaseHasColumns('oauth_users', ['remember_token']);
    }
}
