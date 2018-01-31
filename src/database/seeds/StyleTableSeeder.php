<?php

use Illuminate\Database\Seeder;

class StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert([
          'style' => '{"something" : "this is JSON style 1"}',
          'name' => 'Style number 1',
          'user_id' => 1
        ]);

        DB::table('styles')->insert([
          'style' => '{"something" : "this is JSON style 2"}',
          'name' => 'Style number 2',
          'user_id' => 2
        ]);

        DB::table('styles')->insert([
          'style' => '{"something" : "this is JSON style 3"}',
          'name' => 'Style number 3',
          'user_id' => 3
        ]);

        DB::table('styles')->insert([
          'style' => '{"something" : "this is JSON style 4"}',
          'name' => 'Style number 4',
          'user_id' => 4
        ]);

        DB::table('styles')->insert([
          'style' => '{"something" : "this is JSON style 5"}',
          'name' => 'Style number 5',
          'user_id' => 4
        ]);
    }
}
