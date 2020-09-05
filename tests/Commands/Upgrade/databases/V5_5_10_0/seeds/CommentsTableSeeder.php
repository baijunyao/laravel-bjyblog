<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_5_10_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::table('comments')->insert([
            0 => [
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
        ]);
    }
}
