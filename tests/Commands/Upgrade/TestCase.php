<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade;

use DB;
use Illuminate\Support\Str;
use Mockery;
use Stichoza\GoogleTranslate\GoogleTranslate;

abstract class TestCase extends \Tests\Commands\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->dropAllTables();

        preg_match('/V(\d+_){2,}\d+/', static::class, $version);

        $sqls = explode(';', file_get_contents(base_path("tests/Commands/Upgrade/{$version[0]}/database.sql")));

        foreach ($sqls as $sql) {
            if (Str::startsWith(trim($sql), ['--', '/*', 'LOCK', 'SET', 'UNLOCK', 'COMMIT'])) {
                continue;
            }

            DB::statement($sql);
        }

        $googleTranslate = Mockery::mock('overload:' . GoogleTranslate::class);
        $googleTranslate->shouldReceive('setUrl->setSource->translate')->andReturn('Mockery Slug');
    }

    public function dropAllTables()
    {
        $tables = $this->app['db']->connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $this->app['db']->statement("DROP TABLE $table");
        }
    }
}
