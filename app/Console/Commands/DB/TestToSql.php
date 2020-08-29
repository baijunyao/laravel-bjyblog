<?php

declare(strict_types=1);

namespace App\Console\Commands\DB;

use File;
use Ifsnop\Mysqldump\Mysqldump;
use Illuminate\Console\Command;

class TestToSql extends Command
{
    protected $signature = 'db:test-to-sql';

    protected $description = 'Generate SQL file';

    public function handle(): int
    {
        $directories = File::directories('tests/Commands/Upgrade');

        foreach ($directories as $directory) {
            $version  = strtolower(basename($directory));
            $database = 'sql_' . $version;
            $config   = config('database.connections.mysql');

            $dump = new Mysqldump("mysql:host={$config['host']};dbname=$database", $config['username'], $config['password']);
            $dump->start("$directory/database.sql");
        }

        return 0;
    }
}
