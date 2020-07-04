<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_4_0;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $this->artisan('upgrade:v6.4.0');

        static::assertFalse(
            strpos(
                file_get_contents(base_path('.env')),
                'ELASTICSEARCH_HOSTS'
            )
        );
    }
}
