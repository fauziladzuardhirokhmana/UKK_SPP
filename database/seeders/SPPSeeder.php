<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SPPSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'tahun_ajaran' =>'2020/2021',
        		'nominal' => 3600000,
        	]
        ];

        DB::table('t_spp')->insert($data);
    }
}
