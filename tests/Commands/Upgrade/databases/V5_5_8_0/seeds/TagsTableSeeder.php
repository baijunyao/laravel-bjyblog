<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_5_8_0\Seeds;

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
        DB::table('tags')->delete();
        DB::table('tags')->insert([
            0 => [
                'id'         => 1,
                'name'       => 'laravel',
                'created_at' => '2017-7-16 07:35:12',
                'updated_at' => '2016-7-16 07:35:12',
                'deleted_at' => null,
            ],
        ]);
    }
}
