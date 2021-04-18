<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\t_transaksi;
use App\Models\t_siswa;
use App\Models\t_petugas;
use App\Models\t_spp;

class TransaksiController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|max:10',
            'nis' => 'required|string|max:10',
            'id_spp' => 'required|integer',
            'tanggal_bayar' => 'required|date_format:Y-m-d',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            $res['messages'] = "Data Tidak Valid";
            $res['error'] = $validator->messages();

            return response($res);
        }

    	$petugas = t_petugas::where('nip', '=', $request->nip)->first();
    	if(!$petugas){
            $res['messages'] = "NIP Petugas Tidak Terdaftar";
            $res['error'] = $petugas;

            return response($res);
    	}

    	$siswa = t_siswa::where('nis', '=', $request->nis)->first();
    	if(!$siswa){
            $res['messages'] = "NIS Siswa Tidak Terdaftar";
            $res['error'] = $siswa;

            return response($res);
    	}

    	$spp = t_spp::where('id_spp', '=', $request->id_spp)->first();
    	if(!$spp){
            $res['messages'] = "ID SPP Tidak Terdaftar";
            $res['error'] = $spp;

            return response($res);
    	}

        $file_name = "";
        $file_msg = "";
    	
        if ($file = $request->file('file')) {
            if($file->store('storage/image/'.$request->nis.'/')){
                $file_name = $file->getClientOriginalName();
                $file_msg = "File Berhasil Diupload";
            }
            else{
                $file_msg = "File Gagal Diupload";
            }
        }

        $transaksi = new t_transaksi();
        $transaksi->nip = $request->nip;
        $transaksi->nis = $request->nis;
        $transaksi->id_spp = $request->id_spp;
        $transaksi->tanggal_bayar = $request->tanggal_bayar;
        $transaksi->file = $file_name;
        
        if($transaksi->save()){
            $res['messages'] = "Sukses Memasukkan Data";
            $res['value'] = $transaksi;
        }
        else{
            $res['messages'] = "Gagal Memasukkan Data";
        }

        return response($res);
    }

    public function read(){
        $transaksi = t_transaksi::all();

        if($transaksi){
            if($transaksi->count()>0){
                $res['messages'] = "Sukses Mengambil Data";
                $res['value'] = $transaksi;
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

    public function update(Request $request, $no_struk){
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|max:10',
            'nis' => 'required|string|max:10',
            'id_spp' => 'required|integer',
            'tanggal_bayar' => 'required|date_format:Y-m-d',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            $res['messages'] = "Data Tidak Valid";
            $res['error'] = $validator->messages();

            return response($res);
        }

        $transaksi = t_transaksi::where('no_struk', '=', $request->no_struk)->first();

        if($transaksi){
            $petugas = t_petugas::where('nip', '=', $request->nip)->first();
            if(!$petugas){
                $res['messages'] = "NIP Petugas Tidak Terdaftar";
                $res['error'] = $petugas;

                return response($res);
            }

            $siswa = t_siswa::where('nis', '=', $request->nis)->first();
            if(!$siswa){
                $res['messages'] = "NIS Siswa Tidak Terdaftar";
                $res['error'] = $siswa;

                return response($res);
            }

            $spp = t_spp::where('id_spp', '=', $request->id_spp)->first();
            if(!$spp){
                $res['messages'] = "ID SPP Tidak Terdaftar";
                $res['error'] = $spp;

                return response($res);
            }

            $file_name = "";
            $file_msg = "";
            
            if ($file = $request->file('file')) {
                if($file->store('storage/image/'.$request->nis.'/')){
                    $file_name = $file->getClientOriginalName();
                    $file_msg = "File Berhasil Diupload";
                }
                else{
                    $file_msg = "File Gagal Diupload";
                }
            }

            $data['nip'] = $request->nip;
            $data['nis'] = $request->nis;
            $data['id_spp'] = $request->id_spp;
            $data['tanggal_bayar'] = $request->tanggal_bayar;
            $data['file'] = $file_name;
            
            if($transaksi->where('no_struk', '=', $request->no_struk)->update($data)){
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

    public function delete($no_struk){
        $transaksi = t_transaksi::where('no_struk', '=', $no_struk)->first();

        if($transaksi){
            if($transaksi->where('no_struk', '=', $no_struk)->delete()){
                $res['messages'] = 'Berhasil Menghapus Data';
                $res['value'] = $transaksi;
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

    public function getFile($nis, $nama_file){
        $url = Storage::url('storage/image/'.$nis.'/'.$nama_file);

        if($url){
            $res['messages'] = "Sukses Mendapatkan URL";
            $res['value'] = $url;
        }
        else{
            $res['messages'] = "Gagal Mendapatkan URL";
        }

        return response($res);
    }
}
