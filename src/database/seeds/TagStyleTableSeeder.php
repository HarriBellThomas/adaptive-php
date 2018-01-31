<?php

use Illuminate\Database\Seeder;

class TagStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags_styles')->insert([
          'tag_id' => 1,
          'style_id' => 1
        ]);

        DB::table('tags_styles')->insert([
          'tag_id' => 1,
          'style_id' => 2
        ]);

        DB::table('tags_styles')->insert([
          'tag_id' => 2,
          'style_id' => 2
        ]);

        DB::table('tags_styles')->insert([
          'tag_id' => 3,
          'style_id' => 2
        ]);

        DB::table('tags_styles')->insert([
          'tag_id' => 4,
          'style_id' => 3
        ]);

        DB::table('tags_styles')->insert([
          'tag_id' => 1,
          'style_id' => 3
        ]);
    }
}
