<?php

namespace Tests\Commands\Upgrade\V6_1_0;

use Artisan;
use File;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $sitemapPath = public_path('sitemap.xml');

        File::delete($sitemapPath);

        static::assertFileNotExists($sitemapPath);

        Artisan::call('upgrade:v6.1.0');

        static::assertFileExists($sitemapPath);
    }
}
