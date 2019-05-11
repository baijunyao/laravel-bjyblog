<?php

namespace App\Console\Commands\Upgrade;

use App\Models\Config;
use App\Models\OauthClient;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V5_8_2_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:v5.8.2.0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upgrade to v5.8.2.0';

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
        $configs = Config::whereIn('id', [
            120, 126, 133, 134, 139, 140,
        ])->get()->keyBy('id');

        OauthClient::insert([
            [
                'id'            => 1,
                'name'          => 'qq',
                'client_id'     => $configs->get(120)->value,
                'client_secret' => $configs->get(126)->value,
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 2,
                'name'          => 'weibo',
                'client_id'     => $configs->get(133)->value,
                'client_secret' => $configs->get(134)->value,
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 3,
                'name'          => 'github',
                'client_id'     => $configs->get(139)->value,
                'client_secret' => $configs->get(140)->value,
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
        ]);

        $configs->each(function ($config) {
            $config->forceDelete();
        });

        Schema::table('oauth_users', function (Blueprint $table) {
            $table->renameColumn('type', 'oauth_client_id');
        });
    }
}
