<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_5_8_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            0 => [
                'id'             => 1,
                'name'           => 'test',
                'email'          => 'test@test.com',
                'password'       => bcrypt(123456),
                'remember_token' => null,
                'created_at'     => '2016-10-22 07:35:12',
                'updated_at'     => '2016-10-22 07:35:12',
                'deleted_at'     => null,
            ],
        ]);
    }
}
