<?php

namespace Tests\Commands\Upgrade\V6_6_0;

use App\Models\Config;
use Artisan;
use Illuminate\Support\Env;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Env::getFactory()->create()->set('SESSION_DOMAIN', '.laravel-bjyblog.test');

        Artisan::call('upgrade:v6.6.0');

        static::assertSame(env('SESSION_DOMAIN'), Config::where('id', 185)->value('value'));
    }
}
