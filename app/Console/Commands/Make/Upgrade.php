<?php

declare(strict_types=1);

namespace App\Console\Commands\Make;

use File;
use Illuminate\Console\Command;
use RuntimeException;

class Upgrade extends Command
{
    protected $signature   = 'make:upgrade {version}';
    protected $description = 'Command description';

    public function handle(): int
    {
        /** @var string $version */
        $version       = $this->argument('version');
        $version_upper = strtoupper($version);

        if (preg_match('/V(\d+\.){2}\d+/', $version_upper) === 0) {
            $this->error('Please enter the correct version number, for example v6.0.0');

            return 1;
        }

        // region app/Console/Commands/Upgrade/{version}.php
        // e.g. V12_0_0
        $version_string       = str_replace('.', '_', $version_upper);
        $upgrade_command_file = app_path('Console/Commands/Upgrade/') . $version_string . '.php';

        if (File::missing($upgrade_command_file)) {
            $upgrade_command_content = str_replace(['ClassName', 'version'], [$version_string, $version], File::get(app_path('Console/Commands/Make/stubs/upgrade-command.stub')));
            File::put($upgrade_command_file, $upgrade_command_content);
            $this->info("Generate $upgrade_command_file completed.");
        }

        // endregion

        // region tests/Commands/Upgrade/{version}

        $test_path = base_path("tests/Commands/Upgrade/$version_string/");
        $test_file = $test_path . 'CommandTest.php';

        if (File::missing($test_path)) {
            File::makeDirectory($test_path);
        }

        if (File::missing($test_file)) {
            $test_content = str_replace(['VersionString', 'version'], [$version_string, $version], File::get(app_path('Console/Commands/Make/stubs/command-test.stub')));
            File::put($test_file, $test_content);
            $this->info("Generate $test_file completed.");
        }

        $test_upgrade_file = $test_path . 'UpgradeTest.php';

        if (File::missing($test_upgrade_file)) {
            $test_upgrade_content = str_replace('VersionString', $version_string, File::get(app_path('Console/Commands/Make/stubs/upgrade-test.stub')));
            File::put($test_upgrade_file, $test_upgrade_content);
            $this->info("Generate $test_upgrade_file completed.");
        }

        // endregion

        $previous_version = shell_exec('git tag --sort=-v:refname | head -n 1');

        if (!is_string($previous_version)) {
            throw new RuntimeException('Get previous version error.');
        }

        $previous_version = trim($previous_version);

        if ($previous_version === '') {
            throw new RuntimeException('Get previous version error.');
        }

        // region tests/Commands/Upgrade/databases/{version}

        $test_database_path = base_path("tests/Commands/Upgrade/databases/$version_string/");

        if (File::missing($test_database_path)) {
            File::makeDirectory($test_database_path);
        }

        // Migrations
        $database_path       = 'database/';
        $test_migration_path = $test_database_path . 'migrations';
        File::moveDirectory(database_path('migrations'), $test_migration_path, true);
        File::deleteDirectory($database_path, true);
        shell_exec("git checkout $previous_version -- $database_path/migrations");
        File::copyDirectory(database_path('migrations'), $test_migration_path);
        File::deleteDirectory($database_path, true);

        // Seeds
        shell_exec("git checkout $previous_version -- $database_path/seeds");
        $test_seed_path = $test_database_path . 'seeds';
        File::moveDirectory(database_path('seeds'), $test_seed_path, true);
        File::deleteDirectory($database_path, true);

        shell_exec("git checkout HEAD -- $database_path");
        $test_migration_files = File::files($test_migration_path);

        foreach ($test_migration_files as $test_migration_file) {
            File::put(
                $test_migration_file->getPathname(),
                str_replace([
                    "declare(strict_types=1);\n\n",
                ], [
                    "declare(strict_types=1);\n\nnamespace Tests\\Commands\\Upgrade\\Databases\\$version_string\\Migrations;\n\n",
                ],
                    File::get($test_migration_file->getPathname())
                )
            );
            $this->info('Generate ' . $test_migration_file->getFilename() . ' completed.');
        }

        $test_seed_files = File::files($test_seed_path);

        foreach ($test_seed_files as $test_seed_file) {
            File::put(
                $test_seed_file->getPathname(),
                str_replace([
                    "declare(strict_types=1);\n\nnamespace Database\\Seeders;\n\n",
                ], [
                    "declare(strict_types=1);\n\nnamespace Tests\\Commands\\Upgrade\\Databases\\$version_string\\Seeds;\n\n",
                ],
                    File::get($test_seed_file->getPathname())
                )
            );
            $this->info('Generate ' . $test_seed_file->getFilename() . ' completed.');
        }

        // endregion

        shell_exec('composer dump-autoload');

        return 0;
    }
}
