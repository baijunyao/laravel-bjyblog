<?php

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
        \DB::table('consoles')->delete();

        \DB::table('consoles')->insert([
            [
                'id' => 1,
                'name' => 'App\Console\Commands\Upgrade\V5_5_4_1',
                'created_at' => '2018-09-27 22:26:00',
                'updated_at' => '2018-09-27 22:26:00',
                'deleted_at' => NULL,
            ],
            [
                'id' => 2,
                'name' => 'App\Console\Commands\Upgrade\V5_5_4_3',
                'created_at' => '2018-09-27 22:26:00',
                'updated_at' => '2018-09-27 22:26:00',
                'deleted_at' => NULL,
            ],
            [
                'id' => 3,
                'name' => 'App\Console\Commands\Upgrade\V5_5_6_0',
                'created_at' => '2018-09-28 10:26:00',
                'updated_at' => '2018-09-28 10:26:00',
                'deleted_at' => NULL,
            ],
            [
                'id' => 4,
                'name' => 'App\Console\Commands\Upgrade\V5_5_7_0',
                'created_at' => '2018-11-06 22:26:00',
                'updated_at' => '2018-11-06 22:26:00',
                'deleted_at' => NULL,
            ],
            [
                'id' => 5,
                'name' => 'App\Console\Commands\Upgrade\V5_5_8_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => NULL,
            ],
            [
                'id' => 6,
                'name' => 'App\Console\Commands\Upgrade\V5_5_9_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => NULL,
            ],
            [
                'id' => 7,
                'name' => 'App\Console\Commands\Upgrade\V5_5_10_0',
                'created_at' => '2018-12-31 21:03:00',
                'updated_at' => '2018-12-31 21:03:00',
                'deleted_at' => NULL,
            ]
        ]);
    }
}
