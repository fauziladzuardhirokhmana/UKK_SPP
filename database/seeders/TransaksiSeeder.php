<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
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
        		'nip' =>'1010101010',
        		'nis' => '2222222222',
        		'id_spp' => 1,
                'tanggal_bayar'=> '2020-07-01',
                'file' => 'AAA',
        	],
        	[
                'nip' =>'1010101010',
                'nis' => '3333333333',
                'id_spp' => 1,
                'tanggal_bayar'=> '2020-07-15',
                'file' => 'AAA',
        	],
        	[
                'nip' =>'1010101010',
                'nis' => '4444444444',
                'id_spp' => 1,
                'tanggal_bayar'=> '2020-07-31',
                'file' => 'AAA',
        	],
            [
                'nip' =>'6969696969',
                'nis' => '2222222222',
                'id_spp' => 1,
                'tanggal_bayar'=> '2020-08-01',
                'file' => 'AAA',
            ],
            [
                'nip' =>'6969696969',
                'nis' => '3333333333',
                'id_spp' => 1,
                'tanggal_bayar'=> '2020-08-15',
                'file' => 'AAA',
            ],
            [
                'nip' =>'6969696969',
                'nis' => '4444444444',
                'id_spp' => 1,
                'tanggal_bayar'=> '2020-08-31',
                'file' => 'AAA',
            ],
        ];

        DB::table('t_transaksi')->insert($data);
    }
}
