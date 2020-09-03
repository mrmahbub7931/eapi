<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'   =>  1,
            'name'      =>  'Mahbubar Rahman',
            'number'    =>  '01813883707',
            'email'     =>  'redhatmahbub@gmail.com',
            'address'   =>  'Dhaka',
            'password'  =>  bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'role_id'   =>  2,
            'name'      =>  'Demo User',
            'number'    =>  '01914884707',
            'email'     =>  'demouser@gmail.com',
            'address'   =>  'CTG',
            'password'  =>  bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'role_id'   =>  3,
            'name'      =>  'Shop Manager',
            'number'    =>  '01715885707',
            'email'     =>  'shopmanager@gmail.com',
            'address'   =>  'Rajshahi',
            'password'  =>  bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'role_id'   =>  4,
            'name'      =>  'Riya Roy',
            'number'    =>  '01314886707',
            'email'     =>  'riyaroy@gmail.com',
            'address'   =>  'Dhaka',
            'password'  =>  bcrypt('123456'),
        ]);


    }
}
