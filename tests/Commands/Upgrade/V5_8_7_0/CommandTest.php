<?php

namespace Tests\Commands\Upgrade\V5_8_7_0;

use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $tablePrefix = DB::getTablePrefix();
        $chatSql     = "SHOW TABLES LIKE '{$tablePrefix}chats'";
        $noteSql     = "SHOW TABLES LIKE '{$tablePrefix}notes'";

        static::assertNotEmpty(DB::select($chatSql));
        static::assertEmpty(DB::select($noteSql));

        Artisan::call('upgrade:v5.8.7.0');

        static::assertNotEmpty(DB::select($noteSql));
        static::assertEmpty(DB::select($chatSql));

        $this->assertDatabaseHas('navs', [
            'url' => 'note',
        ]);

        $this->assertDatabaseMissing('navs', [
            'url' => 'chat',
        ]);
    }
}
