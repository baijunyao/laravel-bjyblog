<?php

namespace Tests\Commands\Upgrade\V6_1_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertFileNotExists(public_path('sitemap.xml'));

        Artisan::call('upgrade:v6.1.0');

        static::assertFileExists(public_path('sitemap.xml'));
    }
}
