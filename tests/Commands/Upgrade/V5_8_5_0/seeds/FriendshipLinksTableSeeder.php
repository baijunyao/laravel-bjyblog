<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Seeds;

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
        \DB::table('friendship_links')->truncate();
        \DB::table('friendship_links')->insert([
            [
                'id'         => 1,
                'name'       => '白俊遥博客',
                'url'        => 'https://baijunyao.com',
                'sort'       => 1,
                'created_at' => '2017-7-16 07:35:12',
                'updated_at' => '2016-7-16 07:35:12',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'name'       => '已删除',
                'url'        => 'https://deleted.com',
                'sort'       => 2,
                'created_at' => '2019-01-04 16:35:12',
                'updated_at' => '2019-01-04 16:35:12',
                'deleted_at' => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
