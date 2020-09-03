<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_13_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->truncate();

        DB::table('visits')->insert([
            [
                'id'             => 1,
                'primary_key'    => 'visits:articles_visits',
                'secondary_key'  => 1,
                'score'          => 666,
                'list'           => null,
                'expired_at'     => '2020-02-12 07:35:12',
                'created_at'     => '2020-02-12 07:35:12',
                'updated_at'     => '2020-02-12 07:35:12',
            ],
            [
                'id'             => 2,
                'primary_key'    => 'visits:articles_visits',
                'secondary_key'  => 2,
                'score'          => 222,
                'list'           => null,
                'expired_at'     => '2020-02-12 07:35:12',
                'created_at'     => '2020-02-12 07:35:12',
                'updated_at'     => '2020-02-12 07:35:12',
            ],
            [
                'id'             => 3,
                'primary_key'    => 'visits:articles_visits',
                'secondary_key'  => 3,
                'score'          => 333,
                'list'           => null,
                'expired_at'     => '2020-02-12 07:35:12',
                'created_at'     => '2020-02-12 07:35:12',
                'updated_at'     => '2020-02-12 07:35:12',
            ],
        ]);
    }
}
