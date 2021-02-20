<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V15_0_0;

use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $table_name = config('database.connections.mysql.prefix') . 'comments';

        static::assertNotSame(DB::getDoctrineColumn($table_name, 'is_audited')->getDefault(), '0');

        $this->artisan('upgrade:v15.0.0');

        static::assertSame(DB::getDoctrineColumn($table_name, 'is_audited')->getDefault(), '0');
    }
}
