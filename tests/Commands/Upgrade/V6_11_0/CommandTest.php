<?php

namespace Tests\Commands\Upgrade\V6_11_0;

use App\Models\Article;
use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v6.11.0');

        static::assertEquals(666, Article::find(1)->visits()->count());
        static::assertEquals(222, Article::onlyTrashed()->find(2)->visits()->count());
        static::assertEquals(333, Article::find(3)->visits()->count());
    }
}
