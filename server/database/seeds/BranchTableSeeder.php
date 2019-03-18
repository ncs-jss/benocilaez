<?php
use Illuminate\Database\Seeder;
class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branch')->insert([
            'branch' => 'CE',
        ]);
        DB::table('branch')->insert([
            'branch' => 'CSE',
        ]);
        DB::table('branch')->insert([
            'branch' => 'EC',
        ]);
        DB::table('branch')->insert([
            'branch' => 'EE',
        ]);
        DB::table('branch')->insert([
            'branch' => 'EEE',
        ]);
        DB::table('branch')->insert([
            'branch' => 'IC',
        ]);
        DB::table('branch')->insert([
            'branch' => 'IT',
        ]);
        DB::table('branch')->insert([
            'branch' => 'MBA',
        ]);
        DB::table('branch')->insert([
            'branch' => 'MCA',
        ]);
        DB::table('branch')->insert([
            'branch' => 'ME',
        ]);
        DB::table('branch')->insert([
            'branch' => 'MTECH CS',
        ]);
    }
}