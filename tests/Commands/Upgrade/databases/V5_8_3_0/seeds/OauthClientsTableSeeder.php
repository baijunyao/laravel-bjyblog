<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_8_3_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->truncate();
        DB::table('oauth_clients')->insert([
            [
                'id'            => 1,
                'name'          => 'qq',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 2,
                'name'          => 'weibo',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 3,
                'name'          => 'github',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
        ]);
    }
}
