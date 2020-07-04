<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_14_0;

use App\Models\Article;
use DB;
use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertTrue(Schema::hasTable('visits'));
        static::assertFalse(Schema::hasColumn('articles', 'views'));
        $views = DB::table('visits')
            ->where('primary_key', 'visits:articles_visits')
            ->where('secondary_key', 1)
            ->value('score');

        $this->artisan('upgrade:v6.14.0');

        static::assertFalse(Schema::hasTable('visits'));
        static::assertTrue(Schema::hasColumn('articles', 'views'));
        static::assertEquals($views, Article::where('id', 1)->value('views'));
    }
}
