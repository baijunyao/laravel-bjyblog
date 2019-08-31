<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Seeds;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->truncate();
        \DB::table('comments')->insert([
            [
                'id'            => 1,
                'oauth_user_id' => 1,
                'type'          => 1,
                'pid'           => 0,
                'article_id'    => 1,
                'content'       => '评论的内容',
                'status'        => 1,
                'created_at'    => '2017-7-16 07:35:12',
                'updated_at'    => '2016-7-16 07:35:12',
                'deleted_at'    => null,
            ],
            [
                'id'            => 2,
                'oauth_user_id' => 1,
                'type'          => 1,
                'pid'           => 0,
                'article_id'    => 1,
                'content'       => '已删除',
                'status'        => 1,
                'created_at'    => '2019-01-04 16:35:12',
                'updated_at'    => '2019-01-04 16:35:12',
                'deleted_at'    => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
