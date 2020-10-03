<?php

declare(strict_types=1);

namespace Database\Seeders;

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
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'id'                => 1,
                'socialite_user_id' => 1,
                'article_id'        => 1,
                'content'           => '评论的内容',
                'is_audited'        => 1,
                '_lft'              => 1,
                '_rgt'              => 2,
                'parent_id'         => null,
                'created_at'        => '2017-7-16 07:35:12',
                'updated_at'        => '2016-7-16 07:35:12',
                'deleted_at'        => null,
            ],
            [
                'id'                => 2,
                'socialite_user_id' => 1,
                'article_id'        => 1,
                'content'           => '已删除',
                'is_audited'        => 1,
                '_lft'              => 3,
                '_rgt'              => 4,
                'parent_id'         => null,
                'created_at'        => '2019-01-04 16:35:12',
                'updated_at'        => '2019-01-04 16:35:12',
                'deleted_at'        => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
