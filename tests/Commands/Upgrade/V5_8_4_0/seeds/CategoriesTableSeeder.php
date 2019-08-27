<?php

namespace Tests\Commands\Upgrade\V5_8_4_0\Seeds;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->truncate();
        \DB::table('categories')->insert([
            [
                'id'          => 1,
                'name'        => 'php',
                'keywords'    => 'php',
                'description' => 'php相关的文章',
                'sort'        => 1,
                'pid'         => 0,
                'created_at'  => '2017-7-16 07:35:12',
                'updated_at'  => '2016-7-16 07:35:12',
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'name'        => '用于删除',
                'keywords'    => '用于删除',
                'description' => '用于删除',
                'sort'        => 2,
                'pid'         => 0,
                'created_at'  => '2019-01-04 16:35:12',
                'updated_at'  => '2019-01-04 16:35:12',
                'deleted_at'  => null,
            ],
            [
                'id'          => 3,
                'name'        => '已删除',
                'keywords'    => '已删除',
                'description' => '已删除',
                'sort'        => 3,
                'pid'         => 0,
                'created_at'  => '2019-01-04 16:35:12',
                'updated_at'  => '2019-01-04 16:35:12',
                'deleted_at'  => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
