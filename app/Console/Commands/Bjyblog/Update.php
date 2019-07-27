<?php

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
        })->each(function ($version) use ($console) {
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
    }
}
