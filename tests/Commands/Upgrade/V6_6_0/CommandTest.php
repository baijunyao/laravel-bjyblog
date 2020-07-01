<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_6_0;

use App\Models\Config;
use Illuminate\Support\Env;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Env::getRepository()->set('SESSION_DOMAIN', '.laravel-bjyblog.test');

        $this->artisan('upgrade:v6.6.0');

        static::assertSame(env('SESSION_DOMAIN'), Config::where('id', 185)->value('value'));
    }
}
