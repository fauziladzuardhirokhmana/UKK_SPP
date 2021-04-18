<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\t_kelas;

class KelasController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required|string|max:10',
            'jurusan' => 'required|string|max:50',
            'nama_kelas' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            $res['messages'] = "Data Tidak Valid";
            $res['error'] = $validator->messages();

            return response($res);
        }

    	$kelas = new t_kelas();
    	$kelas->tahun_ajaran = $request->tahun_ajaran;
    	$kelas->jurusan = $request->jurusan;
    	$kelas->nama_kelas = $request->nama_kelas;
        
        if($kelas->save()){
            $res['messages'] = "Sukses Memasukkan Data";
            $res['value'] = $kelas;
        }
        else{
            $res['messages'] = "Gagal Memasukkan Data";
        }

        return response($res);
    }

    public function read(){
    	$kelas = t_kelas::all();

        if($kelas){
            if($kelas->count()>0){
                $res['messages'] = "Sukses Mengambil Data";
                $res['value'] = $kelas;
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

    public function update(Request $request, $id_kelas){
        $kelas = t_kelas::where('id_kelas', '=', $id_kelas)->first();

        if($kelas){
            $validator = Validator::make($request->all(), [
                'tahun_ajaran' => 'required|string|max:10',
                'jurusan' => 'required|string|max:50',
                'nama_kelas' => 'required|string|max:15'
            ]);

            if ($validator->fails()) {
                $res['messages'] = "Data Tidak Valid";
                $res['error'] = $validator->messages();

                return response($res);
            }

            $data = $request->all();

            if($kelas->where('id_kelas', '=', $id_kelas)->update($data)){
                $res['messages'] = 'Berhasil Memperbarui Data';
                $res['value'] = $data;
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
    
    public function delete($id_kelas){
    	$kelas = t_kelas::where('id_kelas', '=', $id_kelas)->first();

        if($kelas){
            if($kelas->where('id_kelas', '=', $id_kelas)->delete()){
                $res['messages'] = 'Berhasil Menghapus Data';
                $res['value'] = $kelas;
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
