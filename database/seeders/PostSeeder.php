<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([[
        	'id' => 'a6d702c2-1f45-4894-b3b8-45619c244f31',
        	'title' => Str::random(100),
        	'description' => Str::random(1000),
        	'website_id' => '7c7f1e74-9a0b-4dd9-889f-df7b1208cd26',
        ],[
        	'id' => '7e8021db-25e1-44db-847b-7d96b0512f3d',
        	'title' => Str::random(100),
        	'description' => Str::random(1000),
        	'website_id' => '7c7f1e74-9a0b-4dd9-889f-df7b1208cd26',
        ],[
        	'id' => 'e468d326-238c-4dad-8834-a02d497646da',
        	'title' => Str::random(100),
        	'description' => Str::random(1000),
        	'website_id' => 'd6c5366c-4c44-40b7-bf6c-53318f841dec',
        ],[
        	'id' => '33ed02ac-f6b2-45e7-a460-593f86d8a6f3',
        	'title' => Str::random(100),
        	'description' => Str::random(1000),
        	'website_id' => 'd6c5366c-4c44-40b7-bf6c-53318f841dec',
        ],[
        	'id' => '6c991a1c-14e5-40f9-a084-724a818262fa',
        	'title' => Str::random(100),
        	'description' => Str::random(1000),
        	'website_id' => '7c900fac-d6fb-4382-925f-f36f089bb299',
        ],[
        	'id' => '37e784c7-7309-4c33-956c-de979247de52',
        	'title' => Str::random(100),
        	'description' => Str::random(1000),
        	'website_id' => '7c900fac-d6fb-4382-925f-f36f089bb299',
        ]]);
    }
}
