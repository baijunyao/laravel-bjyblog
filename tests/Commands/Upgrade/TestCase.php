<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade;

use DB;
use File;
use Illuminate\Support\Str;

abstract class TestCase extends \Tests\Commands\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->dropAllTables();
        preg_match('/V(\d+_){2,}\d+/', static::class, $version);

        // Migration
        $this->app['migration.repository']->createRepository();
        $migrator      = app('migrator');
        $migrate_files = $migrator->getMigrationFiles(base_path('tests/Commands/Upgrade/databases/' . $version[0] . '/migrations'));

        foreach ($migrate_files as $migrate_file) {
            require_once $migrate_file;
            $migrationName = $migrator->getMigrationName($migrate_file);
            $className     = Str::studly(implode('_', array_slice(explode('_', $migrationName), 4)));
            $migrationFQCN = '\\Tests\\Commands\\Upgrade\\Databases\\' . $version[0] . '\\Migrations\\' . $className;

            (new $migrationFQCN())->up();
            DB::table('migrations')->insert([
                'migration' => $migrationName,
                'batch'     => 1,
            ]);
        }

        // Seed
        $seed_files = collect(File::files(base_path('tests/Commands/Upgrade/databases/' . $version[0] . '/seeds')))
            ->transform(function ($seed_file) {
                require_once $seed_file->getPathname();

                return [
                    'cTime'    => $seed_file->getCTime(),
                    'filename' => basename($seed_file->getFilename(), '.php'),
                ];
            })
            ->filter(function ($seed_file) {
                return $seed_file['filename'] === 'DatabaseSeeder' ? false : true;
            })
            ->sortBy('cTime')
            ->pluck('filename');

        foreach ($seed_files as $seed_file) {
            $seedFQCN = '\\Tests\\Commands\\Upgrade\\Databases\\' . $version[0] . '\\Seeds\\' . $seed_file;
            (new $seedFQCN())->run();
        }
    }

    protected function tearDown(): void
    {
        $this->dropAllTables();
        $this->artisan('migrate');
        $this->artisan('db:seed');

        parent::tearDown();
    }

    public function dropAllTables()
    {
        $tables = $this->app['db']->connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $this->app['db']->statement("DROP TABLE $table");
        }
    }
}
