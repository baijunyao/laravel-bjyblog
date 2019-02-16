<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use Artisan;
use Illuminate\Console\Command;

class V5_5_4_1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.5.4.1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.5.4.1';

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
        $data = [
            'id'    => 156,
            'name'  => 'email.encryption',
            'value' => 'ssl',
        ];
        Config::firstOrCreate($data);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        $this->info('success');
    }
}
