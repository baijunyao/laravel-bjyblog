<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V13_0_0;

use Illuminate\Support\Facades\Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertFalse(Schema::hasColumn('oauth_clients', 'provider'));

        $this->artisan('upgrade:v13.0.0');

        static::assertTrue(Schema::hasColumn('oauth_clients', 'provider'));
    }
}
