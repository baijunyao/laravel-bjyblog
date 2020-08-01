<?php

declare(strict_types=1);

namespace App\Console\Commands\Bjyblog;

use App\Models\Console;
use Artisan;
use Composer\Semver\Comparator;
use File;
use Illuminate\Console\Command;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'blog update';

    public function handle(): int
    {
        // 运行迁移
        Artisan::call('migrate', [
            '--force' => true,
        ]);

        $console = Console::pluck('name');

        collect(File::files(app_path('Console/Commands/Upgrade')))->transform(function ($file) {
            return strtolower(str_replace('_', '.', basename($file->getFilename(), '.php')));
        })->sort(function ($prev, $next) {
            return Comparator::greaterThan($prev, $next);
        })->each(function (string $version) use ($console) {
            $name = 'App\Console\Commands\Upgrade\\' . strtoupper(str_replace('.', '_', $version));

            if (!$console->contains($name)) {
                $command = 'upgrade:' . $version;
                Artisan::call($command);
                Console::create([
                    'name' => $name,
                ]);
                $this->info($version . ' success');
            }
        });

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        Artisan::call('queue:restart');

        if (!app()->runningUnitTests()) {
            shell_exec('composer dump-autoload');
        }

        return 0;
    }
}
