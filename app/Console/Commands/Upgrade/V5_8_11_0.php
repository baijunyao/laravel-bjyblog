<?php

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;

class V5_8_11_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.11.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.11.0';

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
        DB::table('configs')->insert([
            'id'         => 172,
            'name'       => 'bjyblog.cdn_domain',
            'value'      => '',
            'created_at' => '2019-08-05 22:15:00',
            'updated_at' => '2019-08-05 22:15:00',
            'deleted_at' => null,
        ]);
    }
}
