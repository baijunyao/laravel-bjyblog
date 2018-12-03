<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Artisan;
use Illuminate\Console\Command;

class V5_5_9_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.9.0';

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
        $configModel = new Config();
        $data = [
            "id" => 159,
            "name" => "database.connections.mysql.dump.dump_binary_path",
            "value" => "/bin/",
        ];
        $configModel->storeData($data);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        $this->info('Upgrade to v5.5.9.0 version completed');
    }
}
