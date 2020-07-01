<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_2_0;

use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v6.2.0');

        static::assertFalse(
            strpos(
                file_get_contents(base_path('.env')),
                'QUEUE_DRIVER'
            )
        );

        static::assertTrue(Schema::hasColumns('tags', ['keywords', 'description']));
    }
}
