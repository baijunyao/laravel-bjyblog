<?php

use Illuminate\Database\Seeder;

class FriendshipLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friendship_links')->delete();
        DB::table('friendship_links')->insert([
            0 =>[
                'id' => 1,
                'name' => '白俊遥博客',
                'url' => 'https://baijunyao.com',
                'sort' => 1,
                'created_at' => '2017-7-16 07:35:12',
                'updated_at' => '2016-7-16 07:35:12',
                'deleted_at' => NULL,
            ],
        ]);
    }
}
