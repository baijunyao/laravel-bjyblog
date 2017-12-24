<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => bcrypt(123456),
                'remember_token' => NULL,
                'created_at' => '2016-10-22 07:35:12',
                'updated_at' => '2016-10-22 07:35:12',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}