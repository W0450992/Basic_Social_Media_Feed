<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //insert seed data into database
        DB::table('roles')->insert([
           'name' =>  'User Administrator',
            'description' => 'admin roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' =>  'Moderator',
            'description' => 'moderator roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' =>  'Theme Manager',
            'description' => 'theme manager roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
