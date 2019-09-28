<?php

namespace Tests\Commands\Upgrade\V6_1_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->assertFileNotExists(public_path('sitemap.xml'));

        Artisan::call('upgrade:v6.1.0');

        $this->assertFileExists(public_path('sitemap.xml'));
    }
}
