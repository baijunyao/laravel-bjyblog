<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Seeds;

use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('chats')->truncate();
        \DB::table('chats')->insert([
            [
                'id'         => 1,
                'content'    => '技术这东西；懂的越多；不懂的就越多；',
                'created_at' => '2017-7-18 07:35:12',
                'updated_at' => '2016-7-18 07:35:12',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'content'    => '已删除',
                'created_at' => '2019-01-04 16:35:12',
                'updated_at' => '2019-01-04 16:35:12',
                'deleted_at' => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
