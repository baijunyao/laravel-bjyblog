<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V17_0_0;

use App\Console\Commands\Upgrade\V17_0_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand(): void
    {
        foreach (V17_0_0::CONFIG as $config) {
            $this->assertDatabaseMissing('configs', $config);
        }

        $this->artisan('upgrade:v17.0.0');

        foreach (V17_0_0::CONFIG as $config) {
            $this->assertDatabaseHas('configs', $config);
        }
    }
}
