<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'sara',
            'mobile'=>'3456789',
            'email'=>'sara@gmail.com',
            'address'=>'kathmandu',
            'course'=>'BCA',
            'total_fee'=>'40000',
        ]);
            }
}
