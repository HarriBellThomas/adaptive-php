<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'user_name' => 'Jim Bob',
          'email' => 'jim@email.com'
        ]);

        DB::table('users')->insert([
          'user_name' => 'Carlos Purves',
          'email' => 'carlos@email.com'
        ]);

        DB::table('users')->insert([
          'user_name' => 'Jake James',
          'email' => 'jake@email.com'
        ]);

        DB::table('users')->insert([
          'user_name' => 'Tristram Newman',
          'email' => 'tristram@email.com'
        ]);

        DB::table('users')->insert([
          'user_name' => 'Louis Harris',
          'email' => 'louis@email.com'
        ]);


    }
}
