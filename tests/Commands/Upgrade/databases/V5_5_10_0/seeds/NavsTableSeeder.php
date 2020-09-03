<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_5_10_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navs')->delete();
        DB::table('navs')->insert([
            0 => [
                'id'         => 1,
                'name'       => '随言碎语',
                'url'        => 'chat',
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => null,
            ],
            1 => [
                'id'         => 2,
                'name'       => '开源项目',
                'url'        => 'git',
                'created_at' => '2018-08-04 12:41:26',
                'updated_at' => '2018-08-04 12:41:26',
                'deleted_at' => null,
            ],
        ]);
    }
}
