<?php

declare(strict_types=1);

namespace App\Extensions\Illuminate\Database\Migrations;

use Illuminate\Database\Migrations\Migrator as BaseMigrator;
use Illuminate\Support\Str;

class Migrator extends BaseMigrator
{
    public function resolve($file)
    {
        $name  = $this->getMigrationName($file);
        $class = Str::studly(implode('_', array_slice(explode('_', $name), 4)));

        if (Str::contains($file, 'tests/Commands/Upgrade')) {
            $class = '\Tests\Commands\Upgrade\\' . explode('/', $file)[5] . '\Migrations\\' . $class;
        }

        return new $class();
    }

    protected function runDown($file, $migration, $pretend)
    {
        // First we will get the file name of the migration so we can resolve out an
        // instance of the migration. Once we get an instance we can either run a
        // pretend execution of the migration or we can run the real migration.
        $name = $this->getMigrationName($file);

        $instance = $this->resolve($file);

        $this->note("<comment>Rolling back:</comment> {$name}");

        if ($pretend) {
            $this->pretendToRun($instance, 'down');

            return;
        }

        $startTime = microtime(true);

        $this->runMigration($instance, 'down');

        $runTime = round(microtime(true) - $startTime, 2);

        // Once we have successfully run the migration "down" we will remove it from
        // the migration repository so it will be considered to have not been run
        // by the application then will be able to fire by any later operation.
        $this->repository->delete($migration);

        $this->note("<info>Rolled back:</info>  {$name} ({$runTime} seconds)");
    }

    protected function runUp($file, $batch, $pretend)
    {
        // First we will resolve a "real" instance of the migration class from this
        // migration file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $name = $this->getMigrationName($file);

        $migration = $this->resolve($file);

        if ($pretend) {
            $this->pretendToRun($migration, 'up');

            return;
        }

        $this->note("<comment>Migrating:</comment> {$name}");

        $startTime = microtime(true);

        $this->runMigration($migration, 'up');

        $runTime = round(microtime(true) - $startTime, 2);

        // Once we have run a migrations class, we will log that it was run in this
        // repository so that we don't try to run it next time we do a migration
        // in the application. A migration repository keeps the migrate order.
        $this->repository->log($name, $batch);

        $this->note("<info>Migrated:</info>  {$name} ({$runTime} seconds)");
    }
}
