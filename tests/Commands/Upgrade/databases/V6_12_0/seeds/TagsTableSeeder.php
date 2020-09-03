<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_12_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        DB::table('tags')->insert([
            [
                'id'          => 1,
                'name'        => 'laravel',
                'slug'        => 'laravel',
                'keywords'    => 'laravel',
                'description' => 'Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。',
                'created_at'  => '2017-7-16 07:35:12',
                'updated_at'  => '2016-7-16 07:35:12',
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'name'        => 'test',
                'slug'        => 'test',
                'keywords'    => 'test',
                'description' => '测试描述',
                'created_at'  => '2019-01-04 15:35:12',
                'updated_at'  => '2019-01-04 15:35:12',
                'deleted_at'  => null,
            ],
            [
                'id'          => 3,
                'name'        => '已删除',
                'slug'        => 'deleted',
                'keywords'    => 'delete',
                'description' => '删除的标签',
                'created_at'  => '2019-01-04 15:35:12',
                'updated_at'  => '2019-01-04 15:35:12',
                'deleted_at'  => '2019-01-04 15:35:12',
            ],
        ]);
    }
}
