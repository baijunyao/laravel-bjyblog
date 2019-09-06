<?php

namespace Tests\Commands\Upgrade\V5_5_7_0\Seeds;

use Illuminate\Database\Seeder;

class GitProjectsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('git_projects')->delete();

        \DB::table('git_projects')->insert([
            0 => [
                'id'         => 1,
                'sort'       => 1,
                'type'       => 1,
                'name'       => 'baijunyao/thinkphp-bjyadmin',
                'created_at' => '2017-10-23 21:09:04',
                'updated_at' => '2017-10-26 21:42:40',
                'deleted_at' => null,
            ],
            1 => [
                'id'         => 2,
                'sort'       => 2,
                'type'       => 2,
                'name'       => 'shuaibai123/thinkphp-bjyadmin',
                'created_at' => '2017-10-26 21:43:07',
                'updated_at' => '2017-10-26 22:02:28',
                'deleted_at' => null,
            ],
            2 => [
                'id'         => 3,
                'sort'       => 3,
                'type'       => 1,
                'name'       => 'baijunyao/thinkphp-bjyblog',
                'created_at' => '2017-10-26 21:43:26',
                'updated_at' => '2017-10-26 22:02:40',
                'deleted_at' => null,
            ],
            3 => [
                'id'         => 4,
                'sort'       => 4,
                'type'       => 2,
                'name'       => 'shuaibai123/thinkbjy',
                'created_at' => '2017-10-26 21:43:56',
                'updated_at' => '2017-10-26 22:02:59',
                'deleted_at' => null,
            ],
            4 => [
                'id'         => 5,
                'sort'       => 5,
                'type'       => 1,
                'name'       => 'baijunyao/laravel-bjyadmin',
                'created_at' => '2017-10-26 22:03:15',
                'updated_at' => '2017-10-26 22:03:15',
                'deleted_at' => null,
            ],
            5 => [
                'id'         => 6,
                'sort'       => 6,
                'type'       => 1,
                'name'       => 'baijunyao/laravel-bjyblog',
                'created_at' => '2017-10-26 22:03:23',
                'updated_at' => '2017-10-26 22:03:23',
                'deleted_at' => null,
            ],
            6 => [
                'id'         => 7,
                'sort'       => 7,
                'type'       => 2,
                'name'       => 'shuaibai123/laravel-bjyadmin',
                'created_at' => '2017-10-26 22:07:24',
                'updated_at' => '2017-10-26 22:07:59',
                'deleted_at' => null,
            ],
            7 => [
                'id'         => 8,
                'sort'       => 8,
                'type'       => 2,
                'name'       => 'shuaibai123/laravel-bjyblog',
                'created_at' => '2017-10-26 22:07:47',
                'updated_at' => '2017-10-26 22:08:04',
                'deleted_at' => null,
            ],
        ]);
    }
}
