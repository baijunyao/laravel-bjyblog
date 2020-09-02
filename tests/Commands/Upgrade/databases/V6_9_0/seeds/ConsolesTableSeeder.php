<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_9_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consoles')->truncate();

        DB::table('consoles')->insert([
            [
                'id'         => 1,
                'name'       => 'App\Console\Commands\Upgrade\V5_5_5_0',
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
            [
                'id'         => 13,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_5_0',
                'created_at' => '2019-06-01 18:28:00',
                'updated_at' => '2019-06-01 18:28:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 14,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_6_0',
                'created_at' => '2019-06-22 18:28:00',
                'updated_at' => '2019-06-22 18:28:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 15,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_7_0',
                'created_at' => '2019-06-28 18:28:00',
                'updated_at' => '2019-06-28 18:28:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 16,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_8_0',
                'created_at' => '2019-07-01 22:28:00',
                'updated_at' => '2019-07-01 22:28:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 18,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_9_0',
                'created_at' => '2019-07-27 14:28:00',
                'updated_at' => '2019-07-27 14:28:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 19,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_10_0',
                'created_at' => '2019-08-02 22:01:00',
                'updated_at' => '2019-08-02 22:01:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 20,
                'name'       => 'App\Console\Commands\Upgrade\V5_8_11_0',
                'created_at' => '2019-08-05 22:11:00',
                'updated_at' => '2019-08-05 22:11:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 21,
                'name'       => 'App\Console\Commands\Upgrade\V6_0_0',
                'created_at' => '2019-09-18 22:30:00',
                'updated_at' => '2019-09-18 22:30:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 22,
                'name'       => 'App\Console\Commands\Upgrade\V6_1_0',
                'created_at' => '2019-09-28 22:30:00',
                'updated_at' => '2019-09-28 22:30:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 23,
                'name'       => 'App\Console\Commands\Upgrade\V6_2_0',
                'created_at' => '2019-10-20 10:30:00',
                'updated_at' => '2019-10-20 10:30:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 24,
                'name'       => 'App\Console\Commands\Upgrade\V6_3_0',
                'created_at' => '2019-10-26 13:35:00',
                'updated_at' => '2019-10-26 13:35:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 25,
                'name'       => 'App\Console\Commands\Upgrade\V6_4_0',
                'created_at' => '2019-11-09 10:35:00',
                'updated_at' => '2019-11-09 10:35:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 26,
                'name'       => 'App\Console\Commands\Upgrade\V6_5_0',
                'created_at' => '2019-11-09 10:35:00',
                'updated_at' => '2019-11-09 10:35:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 27,
                'name'       => 'App\Console\Commands\Upgrade\V6_6_0',
                'created_at' => '2019-12-14 13:03:00',
                'updated_at' => '2019-12-14 13:03:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 28,
                'name'       => 'App\Console\Commands\Upgrade\V6_7_0',
                'created_at' => '2019-12-21 11:03:00',
                'updated_at' => '2019-12-21 11:03:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 29,
                'name'       => 'App\Console\Commands\Upgrade\V6_8_0',
                'created_at' => '2019-12-27 22:13:00',
                'updated_at' => '2019-12-27 22:13:00',
                'deleted_at' => null,
            ],
        ]);
    }
}
