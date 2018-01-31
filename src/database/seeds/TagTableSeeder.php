<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
          'tag_name' => 'this is tag alpha',
          'description' => 'this is alpha\'s brief description'
        ]);

        DB::table('tags')->insert([
          'tag_name' => 'this is tag beta',
          'description' => 'this is beta\'s brief description'
        ]);

        DB::table('tags')->insert([
          'tag_name' => 'this is tag gamma',
          'description' => 'this is gamma\'s brief description'
        ]);

        DB::table('tags')->insert([
          'tag_name' => 'this is tag delta',
          'description' => 'this is delta\'s brief description'
        ]);
    }
}
