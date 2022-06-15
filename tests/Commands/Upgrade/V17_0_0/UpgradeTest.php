<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V17_0_0;

class UpgradeTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testUpgrade(): void
    {
        $this->artisan('bjyblog:update')->assertExitCode(0);
    }
}
