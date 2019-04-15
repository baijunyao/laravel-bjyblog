<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use App\Models\Console;
use Illuminate\Console\Command;

class V5_5_7_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.7.0';

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
        Config::create([
            'id'    => '158',
            'name'  => 'sentry.dsn',
            'value' => '',
        ]);
        $this->info('finish');
    }
}
