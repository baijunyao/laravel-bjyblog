<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V16_0_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v16.0.0')->assertExitCode(0);
    }
}
