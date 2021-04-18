<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
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
        		'jurusan' => 'Rekayasa Perangkat Lunak',
        		'nama_kelas' => 'XII RPL 1',
        	],
        	[
        		'tahun_ajaran' =>'2020/2021',
        		'jurusan' => 'Teknik Komputer dan Jaringan',
        		'nama_kelas' => 'XII TKJ 1',
        	],
        	[
        		'tahun_ajaran' =>'2020/2021',
        		'jurusan' => 'Multimedia',
        		'nama_kelas' => 'XII MM',
        	],
        ];

        DB::table('t_kelas')->insert($data);
    }
}
