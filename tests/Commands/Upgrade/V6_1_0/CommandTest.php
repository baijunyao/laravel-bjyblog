<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_1_0;

use File;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $sitemapPath = public_path('sitemap.xml');

        File::delete($sitemapPath);

        static::assertFileDoesNotExist($sitemapPath);

        $this->artisan('upgrade:v6.1.0');

        static::assertFileExists($sitemapPath);
    }
}
