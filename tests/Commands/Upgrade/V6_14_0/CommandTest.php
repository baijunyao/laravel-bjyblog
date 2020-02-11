<?php

namespace Tests\Commands\Upgrade\V6_14_0;

use App\Models\Article;
use Artisan;
use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertTrue(Schema::hasTable('visits'));
        static::assertFalse(Schema::hasColumn('articles', 'views'));
        $views = Article::find(1)->visits()->count();

        Artisan::call('upgrade:v6.14.0');

        static::assertFalse(Schema::hasTable('visits'));
        static::assertTrue(Schema::hasColumn('articles', 'views'));
        static::assertEquals($views, Article::where('id', 1)->value('views'));
    }
}
