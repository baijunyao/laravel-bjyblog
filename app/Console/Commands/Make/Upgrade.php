<?php

declare(strict_types=1);

namespace App\Console\Commands\Make;

use File;
use Illuminate\Console\Command;

class Upgrade extends Command
{
    protected $signature   = 'make:upgrade {version}';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        /** @var string $version */
        $version      = $this->argument('version');
        $versionUpper = strtoupper($version);

        if (preg_match('/V(\d+\.){2}\d+/', $versionUpper) === 0) {
            $this->error('Please enter the correct version number, for example v6.0.0');

            return;
        }

        $versionString      = str_replace('.', '_', $versionUpper);
        $upgradeCommandFile = app_path('Console/Commands/Upgrade/') . $versionString . '.php';

        if (File::missing($upgradeCommandFile)) {
            $upgradeCommandContent = str_replace(['ClassName', 'version'], [$versionString, $version], File::get(app_path('Console/Commands/Make/stubs/upgrade-command.stub')));
            File::put($upgradeCommandFile, $upgradeCommandContent);
            $this->info("Generate $upgradeCommandFile completed.");
        }

        $testPath = base_path("tests/Commands/Upgrade/$versionString/");
        $testFile = $testPath . 'CommandTest.php';

        if (File::missing($testPath)) {
            File::makeDirectory($testPath);
        }

        if (File::missing($testFile)) {
            $testContent = str_replace(['VersionString', 'version'], [$versionString, $version], File::get(app_path('Console/Commands/Make/stubs/command-test.stub')));
            File::put($testFile, $testContent);
            $this->info("Generate $testFile completed.");
        }

        $testUpgradeFile = $testPath . 'UpgradeTest.php';

        if (File::missing($testUpgradeFile)) {
            $testUpgradeContent = str_replace('VersionString', $versionString, File::get(app_path('Console/Commands/Make/stubs/upgrade-test.stub')));
            File::put($testUpgradeFile, $testUpgradeContent);
            $this->info("Generate $testUpgradeFile completed.");
        }

        $PreviousVersion = trim(shell_exec('git tag --sort=-v:refname | head -n 1') ?? '');

        // Migrations
        $databasePath      = 'database/';
        $testMigrationPath = $testPath . 'migrations';
        File::moveDirectory(database_path('migrations'), $testMigrationPath, true);
        File::deleteDirectory($databasePath, true);
        shell_exec("git checkout $PreviousVersion -- $databasePath/migrations");
        File::copyDirectory(database_path('migrations'), $testMigrationPath);
        File::deleteDirectory($databasePath, true);

        // Seeds
        shell_exec("git checkout $PreviousVersion -- $databasePath/seeds");
        $testSeedPath = $testPath . 'seeds';
        File::moveDirectory(database_path('seeds'), $testSeedPath, true);
        File::deleteDirectory($databasePath, true);

        shell_exec("git checkout HEAD -- $databasePath");
        $testMigrationFiles = File::files($testMigrationPath);

        foreach ($testMigrationFiles as $testMigrationFile) {
            File::put(
                $testMigrationFile->getPathname(),
                str_replace([
                    "declare(strict_types=1);\n\n",
                    'Schema::',
                ], [
                    "declare(strict_types=1);\n\nnamespace Tests\\Commands\\Upgrade\\$versionString\\Migrations;\n\n",
                    '\\Schema::',
                ],
                    File::get($testMigrationFile->getPathname())
                )
            );
            $this->info('Generate ' . $testMigrationFile->getFilename() . ' completed.');
        }

        $testSeedFiles = File::files($testSeedPath);

        foreach ($testSeedFiles as $testSeedFile) {
            File::put(
                $testSeedFile->getPathname(),
                str_replace([
                    "declare(strict_types=1);\n\n",
                    ' DB',
                ], [
                    "declare(strict_types=1);\n\nnamespace Tests\\Commands\\Upgrade\\$versionString\\Seeds;\n\n",
                    ' \\DB',
                ],
                    File::get($testSeedFile->getPathname())
                )
            );
            $this->info('Generate ' . $testSeedFile->getFilename() . ' completed.');
        }

        shell_exec('composer dump-autoload');
    }
}
