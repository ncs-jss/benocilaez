<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'Colorado',
        ]);
        DB::table('category')->insert([
            'name' => 'Mechavoltz',
        ]);
        DB::table('category')->insert([
            'name' => 'Play-it-on',
        ]);
        DB::table('category')->insert([
            'name' => 'Robotiles',
        ]);
    }
}
