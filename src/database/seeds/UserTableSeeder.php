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
          'user_name' => 'Niall Egan',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Carlos Purves',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Harri Bell-Thomas',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Tristram Newman',
        ]);

        DB::table('users')->insert([
          'user_name' => 'Louis Harris',
        ]);


    }
}
