<?php

namespace Tests\Commands\Upgrade\V5_8_4_0;

use Artisan;
use DB;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        $tablePrefix        = DB::getTablePrefix();
        $tables             = [
            'articles',
            'tags',
            'categories',
        ];
        $config = [
            'id'         => 167,
            'name'       => 'bjyblog.seo.use_slug',
            'value'      => 'false',
            'created_at' => '2019-05-19 19:43:00',
            'updated_at' => '2019-05-19 19:43:00',
            'deleted_at' => null,
        ];

        foreach ($tables as $table) {
            $columns = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}{$table}"))->pluck('Field');
            static::assertFalse($columns->contains('slug'));
        }

        $this->assertDatabaseMissing('configs', $config);

        Artisan::call('upgrade:v5.8.4.0');

        foreach ($tables as $table) {
            $columns = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}{$table}"))->pluck('Field');
            static::assertTrue($columns->contains('slug'));
        }

        $this->assertDatabaseHas('configs', $config);
    }
}
