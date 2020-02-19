<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_13_0;

use Artisan;
use Illuminate\Support\Facades\Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertTrue(Schema::hasTable('git_projects'));
        static::assertFalse(Schema::hasTable('open_sources'));
        static::assertDatabaseHas('navs', [
            'url' => 'git',
        ]);
        static::assertDatabaseMissing('navs', [
            'url' => 'openSource',
        ]);

        Artisan::call('upgrade:v6.13.0');

        static::assertFalse(Schema::hasTable('git_projects'));
        static::assertTrue(Schema::hasTable('open_sources'));
        static::assertDatabaseHas('navs', [
            'url' => 'openSource',
        ]);
        static::assertDatabaseMissing('navs', [
            'url' => 'git',
        ]);
    }
}
