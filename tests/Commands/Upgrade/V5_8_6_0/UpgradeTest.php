<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V5_8_6_0;

class UpgradeTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testUpgrade()
    {
        $this->artisan('bjyblog:update')->assertExitCode(0);
    }
}
