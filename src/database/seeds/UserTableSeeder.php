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
        ]);

        DB::table('users')->insert([
          'user_name' => 'Carlos Purves',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Jake James',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Tristram Newman',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Louis Harris',
        ]);


    }
}
