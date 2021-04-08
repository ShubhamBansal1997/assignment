<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebsiteUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_users')->insert([[
        	'id' => 'bd9abc7d-68f6-4d12-a2f2-566a43bf79a7',
        	'website_id' => '7c7f1e74-9a0b-4dd9-889f-df7b1208cd26',
        	'user_id' => 'affaae22-3663-48a8-8dc1-d4e76d85fa1c',
        ],[
        	'id' => '33771395-47d6-4631-9332-70e6839b13d0',
        	'website_id' => '7c7f1e74-9a0b-4dd9-889f-df7b1208cd26',
        	'user_id' => 'e8455b58-8e58-49e0-880b-4ab955fb0883',
        ],[
        	'id' => '01971305-637c-4a6d-85fc-1d5ad52fecbe',
        	'website_id' => 'd6c5366c-4c44-40b7-bf6c-53318f841dec',
        	'user_id' => 'affaae22-3663-48a8-8dc1-d4e76d85fa1c',
        ],[
        	'id' => 'cf0c9c70-b33d-4fec-8b7d-3b915cab4fb5',
        	'website_id' => '7c900fac-d6fb-4382-925f-f36f089bb299',
        	'user_id' => 'e8455b58-8e58-49e0-880b-4ab955fb0883',
        ]]);
    }
}
