<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Seeds;

use Illuminate\Database\Seeder;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('consoles')->truncate();

        \DB::table('consoles')->insert([
            [
                'id'         => 1,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_4_1',
                'created_at' => '2018-09-27 22:26:00',
                'updated_at' => '2018-09-27 22:26:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_4_3',
                'created_at' => '2018-09-27 22:26:00',
                'updated_at' => '2018-09-27 22:26:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_6_0',
                'created_at' => '2018-09-28 10:26:00',
                'updated_at' => '2018-09-28 10:26:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 4,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_7_0',
                'created_at' => '2018-11-06 22:26:00',
                'updated_at' => '2018-11-06 22:26:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 5,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_8_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 6,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_9_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 7,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_10_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 8,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_11_0',
                'created_at' => '2019-02-26 21:10:00',
                'updated_at' => '2019-02-26 21:10:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 9,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_1_0',
                'created_at' => '2019-02-26 21:10:00',
                'updated_at' => '2019-02-26 21:10:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 10,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_2_0',
                'created_at' => '2019-02-26 21:10:00',
                'updated_at' => '2019-02-26 21:10:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 11,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_3_0',
                'created_at' => '2019-05-17 21:10:00',
                'updated_at' => '2019-05-17 21:10:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 12,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_4_0',
                'created_at' => '2019-05-19 18:28:00',
                'updated_at' => '2019-05-19 18:28:00',
                'deleted_at' => null,
            ],
        ]);
    }
}
