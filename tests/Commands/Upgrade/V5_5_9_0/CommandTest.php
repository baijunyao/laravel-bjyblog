<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_5_9_0;

use App\Models\Config;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v5.5.9.0');

        static::assertEquals(7, Config::whereBetween('id', [159, 165])->count());
    }
}
