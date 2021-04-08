<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
        	'id' => 'affaae22-3663-48a8-8dc1-d4e76d85fa1c',
        	'name' => Str::random(10),
        	'email' => Str::random(10).'@gmail.com',
        	'password' => Hash::make('password'),
        ],[
        	'id' => 'e8455b58-8e58-49e0-880b-4ab955fb0883',
        	'name' => Str::random(10),
        	'email' => Str::random(10).'@gmail.com',
        	'password' => Hash::make('password'),
        ]]);
    }
}
