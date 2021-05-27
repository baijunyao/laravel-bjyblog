<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V16_0_0;

use Schema;

class UpgradeTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testUpgrade()
    {
        static::assertFalse(Schema::hasTable('friends'));
        static::assertTrue(Schema::hasTable('friendship_links'));

        $this->artisan('bjyblog:update')->assertExitCode(0);

        static::assertTrue(Schema::hasTable('friends'));
        static::assertFalse(Schema::hasTable('friendship_links'));
    }
}
