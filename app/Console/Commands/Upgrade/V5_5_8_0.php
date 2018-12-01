<?php

namespace App\Console\Commands\Upgrade;

use Artisan;
use Illuminate\Console\Command;

class V5_5_8_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.8.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('Upgrade to v5.5.8.0 version completed');
    }
}
