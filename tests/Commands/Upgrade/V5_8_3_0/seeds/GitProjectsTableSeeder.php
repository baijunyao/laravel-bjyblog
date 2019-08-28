<?php

namespace Tests\Commands\Upgrade\V5_8_3_0\Seeds;

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
        \DB::table('git_projects')->truncate();
        \DB::table('git_projects')->insert([
            [
                'id'         => 1,
                'sort'       => 1,
                'type'       => 1,
                'name'       => 'baijunyao/thinkphp-bjyadmin',
                'created_at' => '2017-10-23 21:09:04',
                'updated_at' => '2017-10-26 21:42:40',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'sort'       => 2,
                'type'       => 2,
                'name'       => 'baijunyao/thinkphp-bjyadmin',
                'created_at' => '2017-10-26 21:43:07',
                'updated_at' => '2017-10-26 22:02:28',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'sort'       => 3,
                'type'       => 1,
                'name'       => 'baijunyao/thinkphp-bjyblog',
                'created_at' => '2017-10-26 21:43:26',
                'updated_at' => '2017-10-26 22:02:40',
                'deleted_at' => null,
            ],
            [
                'id'         => 4,
                'sort'       => 4,
                'type'       => 2,
                'name'       => 'baijunyao/thinkbjy',
                'created_at' => '2017-10-26 21:43:56',
                'updated_at' => '2017-10-26 22:02:59',
                'deleted_at' => null,
            ],
            [
                'id'         => 5,
                'sort'       => 5,
                'type'       => 1,
                'name'       => 'baijunyao/laravel-bjyadmin',
                'created_at' => '2017-10-26 22:03:15',
                'updated_at' => '2017-10-26 22:03:15',
                'deleted_at' => null,
            ],
            [
                'id'         => 6,
                'sort'       => 6,
                'type'       => 1,
                'name'       => 'baijunyao/laravel-bjyblog',
                'created_at' => '2017-10-26 22:03:23',
                'updated_at' => '2017-10-26 22:03:23',
                'deleted_at' => null,
            ],
            [
                'id'         => 7,
                'sort'       => 7,
                'type'       => 2,
                'name'       => 'baijunyao/laravel-bjyadmin',
                'created_at' => '2017-10-26 22:07:24',
                'updated_at' => '2017-10-26 22:07:59',
                'deleted_at' => null,
            ],
            [
                'id'         => 8,
                'sort'       => 8,
                'type'       => 2,
                'name'       => 'baijunyao/laravel-bjyblog',
                'created_at' => '2017-10-26 22:07:47',
                'updated_at' => '2017-10-26 22:08:04',
                'deleted_at' => null,
            ],
            [
                'id'         => 9,
                'sort'       => 9,
                'type'       => 2,
                'name'       => 'deleted/deleted',
                'created_at' => '2019-01-04 16:35:12',
                'updated_at' => '2019-01-04 16:35:12',
                'deleted_at' => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
