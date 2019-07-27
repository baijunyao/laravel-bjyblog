<?php

namespace Tests\Commands\Upgrade\V5_8_9_0\Seeds;

use Illuminate\Database\Seeder;

class SocialiteClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('socialite_clients')->truncate();
        \DB::table('socialite_clients')->insert([
            [
                'id'            => 1,
                'name'          => 'qq',
                'icon'          => 'qq',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 2,
                'name'          => 'weibo',
                'icon'          => 'weibo',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 3,
                'name'          => 'github',
                'icon'          => 'github',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-08 22:13:54',
                'updated_at'    => '2019-05-08 22:13:54',
                'deleted_at'    => null,
            ],
            [
                'id'            => 4,
                'name'          => 'google',
                'icon'          => 'google',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
            [
                'id'            => 5,
                'name'          => 'facebook',
                'icon'          => 'facebook',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-05-14 23:26:38',
                'updated_at'    => '2019-05-14 23:26:38',
                'deleted_at'    => null,
            ],
            [
                'id'            => 6,
                'name'          => 'vkontakte',
                'icon'          => 'vk',
                'client_id'     => '',
                'client_secret' => '',
                'created_at'    => '2019-07-01 23:26:38',
                'updated_at'    => '2019-07-01 23:26:38',
                'deleted_at'    => null,
            ],
        ]);
    }
}
