<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
          'review' => 'This was a rubbish style',
          'stars' => 2,
          'user_id' => 2,
          'style_id' => 3
        ]);
    }
}
