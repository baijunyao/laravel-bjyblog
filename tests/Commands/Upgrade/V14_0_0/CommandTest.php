<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V14_0_0;

use Illuminate\Support\Facades\Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertFalse(Schema::hasColumn('failed_jobs', 'uuid'));

        $this->artisan('upgrade:v14.0.0');

        static::assertTrue(Schema::hasColumn('failed_jobs', 'uuid'));
    }
}
