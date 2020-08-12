<?php

declare(strict_types=1);

namespace App\Console\Commands\Seeder;

use Artisan;
use File;
use Illuminate\Console\Command;

class ToSql extends Command
{
    protected $signature = 'seeder:test';

    protected $description = 'Command description';

    public function handle(): int
    {
        $directories = File::directories('tests/Commands/Upgrade');

        foreach ($directories as $directory) {
            $version            = basename($directory);
            $database           = 'sql_' . strtolower($version);
            $config             = config('database.connections.mysql');
            $config['database'] = $database;

            config([
                "database.connections.$database" => $config,
            ]);

            $seeders = File::files($directory . '/seeds');

            foreach ($seeders as $seeder) {
                if ($seeder->getFilenameWithoutExtension() !== 'DatabaseSeeder') {
                    Artisan::call('db:seed', [
                        '--database' => $database,
                        '--class'    => '\Tests\Commands\Upgrade\\' . $version . '\Seeds\\' . $seeder->getFilenameWithoutExtension(),
                    ]);
                }
            }
        }

        return 0;
    }
}
