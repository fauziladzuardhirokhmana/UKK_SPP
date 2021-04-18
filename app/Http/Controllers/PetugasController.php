<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\t_petugas;

class PetugasController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:t_petugas,nip|string|max:10',
            'nama_petugas' => 'required|string|max:50',
            'password' => 'required|string|max:100',
            'role' => 'in:admin,petugas'
        ]);

        if ($validator->fails()) {
            $res['messages'] = "Data Tidak Valid";
            $res['error'] = $validator->messages();

            return response($res);
        }
    	
    	$petugas = new t_petugas();
    	$petugas->nip = $request->nip;
    	$petugas->nama_petugas = $request->nama_petugas;
    	$petugas->password = Hash::make($request->password);
    	$petugas->role = $request->role;
        
        if($petugas->save()){
            $res['messages'] = "Sukses Memasukkan Data";
            $res['nip'] = $petugas['nip'];
            $res['nama_petugas'] = $petugas['nama_petugas'];
            $res['password'] = $request->password;
            $res['role'] = $petugas['role'];
        }
        else{
            $res['messages'] = "Gagal Memasukkan Data";
        }

        return response($res);
    }

    public function read(){
    	$petugas = t_petugas::orderBy('created_at', 'asc')->get();

        if($petugas){
            if($petugas->count()>0){
                $res['messages'] = "Sukses Mengambil Data";
                $res['value'] = $petugas;
            }
            else{
                $res['messages'] = "Tidak Ada Data";
            }
        }
        else{
            $res['messages'] = "Gagal Mengambil Data";
        }

        return response($res);
    }

    public function update(Request $request, $nip){
        $petugas = t_petugas::where('nip', '=', $nip)->first();

        if($petugas){
            $validator = Validator::make($request->all(), [
                'nip' => 'required|exists:t_petugas,nip|string|max:10',
                'nama_petugas' => 'required|string|max:50',
                'password' => 'required|string|max:100',
                'role' => 'in:admin,petugas'
            ]);

            if ($validator->fails()) {
                $res['messages'] = "Data Tidak Valid";
                $res['error'] = $validator->messages();

                return response($res);
            }

            $data['nip'] = $request->nip;
            $data['nama_petugas'] = $request->nama_petugas;
            $data['role'] = $request->role;

            if($request->password == $petugas->password){
                $data['password'] = $petugas->password;
            }
            else{
                $data['password'] = Hash::make($request->password);
            }

            if($petugas->where('nip', '=', $nip)->update($data)){
                $res['messages'] = 'Berhasil Memperbarui Data';
                $res['nip'] = $data['nip'];
                $res['nama_petugas'] = $data['nama_petugas'];
                $res['password'] = $request->password;
                $res['role'] = $data['role'];
            }
            else{
                $res['messages'] = 'Gagal Memperbarui Data';
            }
        }
        else{
            $res['messages'] = 'Data Tidak Ditemukan';
        }

        return response($res);
    }

    public function delete($nip){
    	$petugas = t_petugas::where('nip', '=', $nip)->first();

        if($petugas){
            if($petugas->where('nip', '=', $nip)->delete()){
                $res['messages'] = 'Berhasil Menghapus Data';
                $res['value'] = $petugas;
            }
            else{
                $res['messages'] = 'Gagal Menghapus Data';
            }            
        }
        else{
            $res['messages'] = 'Data Tidak Ditemukan';
        }

        return response($res);
    }
}
