<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V12_0_0;

use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertFalse(Schema::hasColumn('socialite_users', 'is_blocked'));

        $this->artisan('upgrade:v12.0.0');

        static::assertTrue(Schema::hasColumn('socialite_users', 'is_blocked'));
    }
}
