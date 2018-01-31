<?php

use Illuminate\Database\Seeder;

class UserStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_styles')->insert([
          'user_id' => 1,
          'style_id' => 1
        ]);

        DB::table('users_styles')->insert([
          'user_id' => 2,
          'style_id' => 2
        ]);

        DB::table('users_styles')->insert([
          'user_id' => 3,
          'style_id' => 3
        ]);

        DB::table('users_styles')->insert([
          'user_id' => 4,
          'style_id' => 5
        ]);
    }
}
