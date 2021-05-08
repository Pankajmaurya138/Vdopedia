<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => "Education",
            'slug'=>'Education',
            
        ]);
        DB::table('category')->insert([
            'name' => "Music",
            'slug'=>'Music',
            
        ]);
        DB::table('category')->insert([
            'name' => "News",
            'slug'=>'News',
            
        ]);
        DB::table('category')->insert([
            'name' => "video Song",
            'slug'=>'video Song',
        ]);
    }
}
