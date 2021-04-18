<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
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
                'nis' => '2222222222',
                'nisn' => '2222222222',
                'nama_siswa' => 'Chandra Deni',
                'id_kelas' => 1,
                'alamat' => 'Jl. Buah Batu',
                'no_tlp' => '082222222222',
            ],
            [
                'nis' => '3333333333',
                'nisn' => '3333333333',
                'nama_siswa' => 'Dani Nugraha',
                'id_kelas' => 2,
                'alamat' => 'Jl. Kliningan',
                'no_tlp' => '083333333333',
            ],
            [
                'nis' => '4444444444',
                'nisn' => '4444444444',
                'nama_siswa' => 'Esih Sukaesih',
                'id_kelas' => 3,
                'alamat' => 'Jl. Solontongan',
                'no_tlp' => '084444444444',
            ],
        ];

        DB::table('t_siswa')->insert($data);
    }
}
