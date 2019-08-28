<?php

namespace App\Console\Commands\Upgrade;

use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_3_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.3.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.3.0';

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
        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->dropColumn('client_id_config');
            $table->dropColumn('client_secret_config');
        });

        DB::table('oauth_clients')->insert([
            [
                'id'            => 4,
                'name'          => 'google',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
            [
                'id'            => 5,
                'name'          => 'facebook',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
        ]);
    }
}
