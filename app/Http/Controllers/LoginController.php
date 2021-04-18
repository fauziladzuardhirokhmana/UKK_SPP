<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\t_petugas;
use App\Models\t_siswa;

class LoginController extends Controller
{
    public function login(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	$siswa = t_siswa::where('nis', '=', $username)->where('nisn', '=', $password)->first();
        $petugas = t_petugas::where('nip', '=', $username)->first();

    	if($siswa){
            $data['messages'] = 'Berhasil Login';
            $data['username'] = $username;
            $data['nama'] = $siswa->nama_siswa;
            $data['role'] = 'siswa';
    	}
        elseif ($petugas) {
            $status = Hash::check($password, $petugas->password);

            if($status){
                $data['messages'] = 'Berhasil Login';
                $data['username'] = $petugas->nip;
                $data['nama'] = $petugas->nama_petugas;
                $data['role'] = $petugas->role;
            }
            else{
                $data['messages'] = 'Gagal Login. Username Atau Password Salah';
            }
        }
        else{
            $data['messages'] = 'Gagal Login. Username Atau Password Salah';
        }

        return response($data);
    }
}
