<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_8_9_0\Seeds;

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
                'id'         => 1,
                'name'       => 'laravel',
                'slug'       => 'laravel',
                'created_at' => '2017-7-16 07:35:12',
                'updated_at' => '2016-7-16 07:35:12',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'name'       => 'test',
                'slug'       => 'test',
                'created_at' => '2019-01-04 15:35:12',
                'updated_at' => '2019-01-04 15:35:12',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'name'       => '已删除',
                'slug'       => 'deleted',
                'created_at' => '2019-01-04 15:35:12',
                'updated_at' => '2019-01-04 15:35:12',
                'deleted_at' => '2019-01-04 15:35:12',
            ],
        ]);
    }
}
