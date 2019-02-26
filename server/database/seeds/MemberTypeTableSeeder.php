<?php

use Illuminate\Database\Seeder;

class MemberTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_type')->insert([
            'name' => 'Coordinator',
        ]);
        DB::table('member_type')->insert([
            'name' => 'CTC',
        ]);
        DB::table('member_type')->insert([
            'name' => 'Volunteer',
        ]);
    }
}
