<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'  =>  'Admin',
            'slug'  =>  'admin'
        ]);

        DB::table('roles')->insert([
            'name'  =>  'Demo Admin',
            'slug'  =>  'demo-admin'
        ]);

        DB::table('roles')->insert([
            'name'  =>  'Shop Manager',
            'slug'  =>  'shopmanager'
        ]);
        
        DB::table('roles')->insert([
            'name'  =>  'Customer',
            'slug'  =>  'customer'
        ]);
        


    }
}
