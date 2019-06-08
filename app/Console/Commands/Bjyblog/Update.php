<?php

namespace App\Console\Commands\Bjyblog;

use App\Models\Config;
use App\Models\Console;
use App\Models\Nav;
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

        // 填充 navs 表的默认数据
        $navCount = Nav::select('id')->count();
        if ($navCount === 0) {
            Artisan::call('db:seed', [
                '--class' => 'NavsTableSeeder',
            ]);
            $this->info('navs seed success');
        }

        // 升级 config 配置项的表数据
        $configCount = Config::where('id', '>', 100)->count();
        if ($configCount === 0) {
            Artisan::call('seeder:upgradeConfig');
            $this->info('upgrade config success');
        }

        $console = Console::pluck('name');

        collect(File::files(app_path('Console/Commands/Upgrade')))->transform(function ($file) {
            return strtolower(str_replace('_', '.', basename($file->getFilename(), '.php')));
        })->sort(function ($prev, $next) {
            return Comparator::greaterThan($prev, $next);
        })->each(function ($version) use ($console) {
            $name = 'App\Console\Commands\Upgrade\\' . strtoupper(str_replace('.', '_', $version));

            if (!$console->contains($name)) {
                dump($name);
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
