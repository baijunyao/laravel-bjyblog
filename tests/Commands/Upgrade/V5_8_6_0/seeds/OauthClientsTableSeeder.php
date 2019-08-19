<?php

namespace Tests\Commands\Upgrade\V5_8_6_0\Seeds;

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_clients')->truncate();
        \DB::table('oauth_clients')->insert([
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
