<?php

namespace Tests\Commands\Upgrade\V6_2_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v6.2.0');

        static::assertFalse(
            strpos(
                file_get_contents(base_path('.env')),
                'QUEUE_DRIVER'
            )
        );

        $this->assertDatabaseHasColumns('tags', ['keywords', 'description']);
    }
}
