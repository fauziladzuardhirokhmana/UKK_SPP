<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
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
        		'nama_petugas' => 'Ahmad Kasim',
        		'password' => Hash::make('admin'),
                'role' => 'admin',
        	],
        	[
        		'nip' =>'6969696969',
        		'nama_petugas' => 'Budi Gunawan',
        		'password' => Hash::make('petugas'),
                'role' => 'petugas',
        	]
        ];

        DB::table('t_petugas')->insert($data);
    }
}
