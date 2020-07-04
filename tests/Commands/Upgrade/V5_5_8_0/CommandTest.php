<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_5_8_0;

use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v5.5.8.0');

        static::assertTrue(Schema::hasColumn('oauth_users', 'remember_token'));
    }
}
