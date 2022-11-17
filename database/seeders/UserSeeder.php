<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        DB::table('users')->insert([
            'name' =>  'Jane UserAdmin',
            'email' => 'jane@example.com',
            'password' => '$2a$12$Ani6D2F2LycSIm0SszfngOVY.03trwYgHalQHl2/V0O7tbY2VWnb2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' =>  'Bob Moderator',
            'email' => 'bob@example.com',
            'password' => '$2a$12$Zc8ORiI2XPLzMqKU/5ASF.auF2U1vFuR1RZk/ED9yZKiVSErS.TWu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' =>  'Susan ThemeAdmin',
            'email' => 'susan@example.com',
            'password' => '$2a$12$xyCNDmlu6AS3VX/4sTKKUuAxWV8pKfg.kWHWzZDEMl1bHXGHY4e6i',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
