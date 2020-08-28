<?php

declare(strict_types=1);

namespace App\Console\Commands\Migration;

use Artisan;
use File;
use Illuminate\Console\Command;
use PDO;

class Test extends Command
{
    protected $signature = 'migration:test';

    protected $description = 'Command description';

    public function handle(): int
    {
        $directories = File::directories('tests/Commands/Upgrade');

        foreach ($directories as $directory) {
            $version = strtolower(basename($directory));

            $database = 'sql_' . $version;

            $config             = config('database.connections.mysql');
            $config['database'] = $database;

            config([
                "database.connections.$database" => $config,
            ]);

            $this->createDatabase($database);

            Artisan::call("migrate --database=$database --path=$directory/migrations");
        }

        return 0;
    }

    private function createDatabase(string $database): void
    {
        $config = config('database.connections.mysql');
        $dbh    = new PDO('mysql:host=' . $config['host'], $config['username'], $config['password']);
        $dbh->exec('CREATE DATABASE ' . $database);
    }
}
