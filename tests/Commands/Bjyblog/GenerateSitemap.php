<?php

namespace Tests\Commands\Bjyblog;

use Artisan;
use File;
use Tests\TestCase;

class GenerateSitemap extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCommand()
    {
        $sitemapPath = public_path('sitemap.xml');

        File::delete($sitemapPath);

        static::assertFileNotExists($sitemapPath);

        Artisan::call('bjyblog:generateSitemap');

        static::assertFileExists($sitemapPath);
        static::assertEquals(File::get(base_path('tests/Commands/_baseline/Bjyblog/GenerateSitemap/sitemap.xml')), File::get($sitemapPath));
    }
}
