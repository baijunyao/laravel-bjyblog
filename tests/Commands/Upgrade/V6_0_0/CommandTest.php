<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_0_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v6.0.0');

        $this->assertDatabaseHas('migrations', [
            'migration' => '2019_08_19_000000_create_failed_jobs_table',
            'batch'     => 1,
        ]);

        static::assertFalse(
            strpos(
                file_get_contents(base_path('.env')),
                'SCOUT_DRIVER=tntsearch'
            )
        );
    }
}
