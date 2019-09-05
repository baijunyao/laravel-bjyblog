<?php

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
        $version      = $this->argument('version');
        $versionUpper = strtoupper($version);

        if (preg_match('/V(\d+\.){3}\d+/', $versionUpper) === 0) {
            $this->error('Please enter the correct version number, for example v5.5.5.5.');

            return;
        }

        $versionString      = str_replace('.', '_', $versionUpper);
        $upgradeCommandFile = app_path('Console/Commands/Upgrade/') . $versionString . '.php';

        if (!File::exists($upgradeCommandFile)) {
            $upgradeCommandContent = <<<PHP
<?php

namespace App\\Console\\Commands\\Upgrade;

use Illuminate\\Console\\Command;

class $versionString extends Command
{
    protected \$signature = 'upgrade:$version';
    protected \$description = 'Upgrade to $version';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

    }
}

PHP;
            File::put($upgradeCommandFile, $upgradeCommandContent);
            $this->info("Generate $upgradeCommandFile completed.");
        }

        $testPath = base_path("tests/Commands/Upgrade/$versionString/");
        $testFile = $testPath . 'CommandTest.php';

        if (!File::exists($testPath)) {
            File::makeDirectory($testPath);
        }

        if (!File::exists($testFile)) {
            $testContent = <<<PHP
<?php

namespace Tests\\Commands\\Upgrade\\$versionString;

use Artisan;

class CommandTest extends \\Tests\\Commands\\Upgrade\\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:$version');
    }
}

PHP;
            File::put($testFile, $testContent);
            $this->info("Generate $testFile completed.");
        }

        $databasePath = database_path();
        File::deleteDirectory($databasePath, true);

        shell_exec("git checkout $version -- $databasePath");
        $testMigrationPath = $testPath . 'migrations';
        $testSeedPath      = $testPath . 'seeds';
        File::moveDirectory(database_path('migrations'), $testMigrationPath, true);
        File::moveDirectory(database_path('seeds'), $testSeedPath, true);
        shell_exec("git checkout develop -- $databasePath");
        $testMigrationFiles = File::files($testMigrationPath);

        foreach ($testMigrationFiles as $testMigrationFile) {
            File::put(
                $testMigrationFile->getPathname(),
                str_replace([
                    "\t",
                    "<?php\n",
                    ' Schema',
                ], [
                    '    ',
                    "<?php\n\nnamespace Tests\\Commands\\Upgrade\\$versionString\\Migrations;\n",
                    ' \\Schema',
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
                    "\t",
                    "<?php\n",
                    ' DB',
                ], [
                    '    ',
                    "<?php\n\nnamespace Tests\\Commands\\Upgrade\\$versionString\\Seeds;\n",
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
