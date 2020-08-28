<?php

declare(strict_types=1);

namespace App\Console\Commands\DB;

use Ifsnop\Mysqldump\Mysqldump;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use PDO;

class ToSql extends Command
{
    protected $signature = 'db:to-sql {path}';

    protected $description = 'Generate SQL file';

    public function handle(): int
    {
        /** @var string $path */
        $path = $this->argument('path');

        $database = 'sql_' . Date::now()->format('YmdHis');

        $this->createDatabase($database);

        /** @var string $connection */
        $connection = $this->argument('connection');
        $config     = config('database.connections.' . $connection);

        [
            'host'     => $host,
            'database' => $database,
            'username' => $username,
            'password' => $password
        ] = $config;

        $dump = new Mysqldump("mysql:host=$host;dbname=$database", $username, $password);
        $dump->start('storage/dump.sql');

        return 0;
    }

    private function createDatabase(string $database): void
    {
        $config = config('database.connections.mysql');
        $dbh    = new PDO('mysql:host=' . $config['host'], $config['username'], $config['password']);
        $dbh->exec('CREATE DATABASE ' . $database);
    }
}
