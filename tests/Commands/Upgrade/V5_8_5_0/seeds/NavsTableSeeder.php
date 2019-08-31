<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Seeds;

use Illuminate\Database\Seeder;

class NavsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('navs')->truncate();
        \DB::table('navs')->insert([
            [
                'id'         => 1,
                'name'       => '随言碎语',
                'url'        => 'chat',
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'name'       => '开源项目',
                'url'        => 'git',
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'name'       => '已删除',
                'url'        => 'deleted',
                'created_at' => '2019-01-04 16:35:12',
                'updated_at' => '2019-01-04 16:35:12',
                'deleted_at' => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
