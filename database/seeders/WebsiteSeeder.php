<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([[
        	'id' => '7c7f1e74-9a0b-4dd9-889f-df7b1208cd26',
        	'name' => 'www.'.Str::random(10).'.com',
        ],[
        	'id' => 'd6c5366c-4c44-40b7-bf6c-53318f841dec',
        	'name' => 'www.'.Str::random(10).'.com',
        ],[
        	'id' => '7c900fac-d6fb-4382-925f-f36f089bb299',
        	'name' => 'www.'.Str::random(10).'.com',
        ]]);
    }
}
