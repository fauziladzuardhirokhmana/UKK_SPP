<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\t_kelas;
use App\Models\t_siswa;

class SiswaController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:t_siswa,nis|string|max:10',
            'nisn' => 'required|unique:t_siswa,nisn|string|max:15',
            'nama_siswa' => 'required|string|max:50',
            'id_kelas' => 'required|string|max:11',
            'alamat' => 'required|string',
            'no_tlp' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            $res['messages'] = "Data Tidak Valid";
            $res['error'] = $validator->messages();

            return response($res);
        }

    	$kelas = t_kelas::where('id_kelas', '=', $request->id_kelas)->first();
    	if(!$kelas){
            $res['messages'] = "ID Kelas Tidak Terdaftar";

            return response($res);
    	}

    	$siswa = new t_siswa();
    	$siswa->nis = $request->nis;
    	$siswa->nisn = $request->nisn;
    	$siswa->nama_siswa = $request->nama_siswa;
    	$siswa->id_kelas = $request->id_kelas;
    	$siswa->alamat = $request->alamat;
    	$siswa->no_tlp = $request->no_tlp;
        
        if($siswa->save()){
            $res['messages'] = "Sukses Memasukkan Data";
            $res['value'] = $siswa;
        }
        else{
            $res['messages'] = "Gagal Memasukkan Data";
        }

        return response($res);
    }

    public function read(){
    	$siswa = t_siswa::all();

        if($siswa){
            if($siswa->count()>0){
                $res['messages'] = "Sukses Mengambil Data";
                $res['value'] = $siswa;
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

    public function update(Request $request, $nis){
        $siswa = t_siswa::where('nis', '=', $nis)->first();

        if($siswa){
            $validator = Validator::make($request->all(), [
                'nis' => 'required|string|max:10|exists:t_siswa,nis',
                'nisn' => 'required|string|max:15|exists:t_siswa,nisn',
                'nama_siswa' => 'required|string|max:50',
                'id_kelas' => 'required|string|max:11',
                'alamat' => 'required|string',
                'no_tlp' => 'required|string|max:15'
            ]);

            if ($validator->fails()) {
                $res['messages'] = "Data Tidak Valid";
                $res['error'] = $validator->messages();

                return response($res);
            }
            
    		$kelas = t_kelas::where('id_kelas', '=', $request->id_kelas)->first();
    		if(!$kelas){
                $res['messages'] = "ID Kelas Tidak Terdaftar";
                $res['error'] = $kelas;

                return response($res);
    		}

            $data = $request->all();

            if($siswa->where('id_kelas', '=', $request->id_kelas)->update($data)){
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
    
    public function delete($nis){
    	$siswa = t_siswa::where('nis', '=', $nis)->first();

        if($siswa){
            if($siswa->where('nis', '=', $nis)->delete()){
                $res['messages'] = 'Berhasil Menghapus Data';
                $res['value'] = $siswa;
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
