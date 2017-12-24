<?php

use Illuminate\Database\Seeder;

class OauthUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_users')->delete();
        DB::table('oauth_users')->insert([
            0 =>[
                'id' => 1,
                'type' => 1,
                'name' => '白俊遥',
                'avatar' => '/uploads/article/default.jpg',
                'openid' => '',
                'access_token' => '',
                'last_login_ip' => '127.0.0.1',
                'login_times' => 1,
                'email' => 'baijunyao@baijunyao.com',
                'is_admin' => 0,
                'created_at' => '2017-7-24 07:35:12',
                'updated_at' => '2017-7-24 07:35:12',
                'deleted_at' => NULL,
            ],
        ]);
    }
}
