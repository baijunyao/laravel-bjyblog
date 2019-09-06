<?php

namespace Tests\Commands;

use DB;

abstract class TestCase extends \Tests\TestCase
{
    public function assertDatabaseHasColumns($table, array $columns)
    {
        $allTableColumns = $this->getTableColumns($table);

        foreach ($columns as $column) {
            static::assertTrue($allTableColumns->contains($column));
        }
    }

    public function assertDatabaseMissingColumns($table, array $columns)
    {
        $allTableColumns = $this->getTableColumns($table);

        foreach ($columns as $column) {
            static::assertTrue($allTableColumns->contains($column));
        }
    }

    private function getTableColumns($table)
    {
        $tablePrefix = DB::getTablePrefix();

        return collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}{$table}"))->pluck('Field');
    }
}
