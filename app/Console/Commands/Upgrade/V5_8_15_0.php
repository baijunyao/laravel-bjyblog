<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;

class V5_8_15_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.15.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.15.0';

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
        $this->call('passport:client', ['--password' => true, '--name' => config('app.name').' Password Grant Client']);
    }
}
