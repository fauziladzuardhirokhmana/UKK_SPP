<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\t_transaksi;
use App\Models\t_spp;

class SPPController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required|string|max:10',
            'nominal' => 'required|numeric|digits_between:1, 8'
        ]);

        if ($validator->fails()) {
            $res['messages'] = "Data Tidak Valid";
            $res['error'] = $validator->messages();

            return response($res);
        }

    	$spp = new t_spp();
    	$spp->tahun_ajaran = $request->tahun_ajaran;
    	$spp->nominal = $request->nominal;
    	
    	if($spp->save()){
    		$res['messages'] = "Sukses Memasukkan Data";
            $res['value'] = $spp;
    	}
        else{
            $res['messages'] = "Gagal Memasukkan Data";
        }

        return response($res);
    }

    public function read(){
    	$spp = t_spp::all();

    	if($spp){
    		if($spp->count()>0){
                $res['messages'] = "Sukses Mengambil Data";
                $res['value'] = $spp;
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

    public function update(Request $request, $id_spp){
        $spp = t_spp::where('id_spp', '=', $id_spp)->first();
        
        if($spp){
            $validator = Validator::make($request->all(), [
                'tahun_ajaran' => 'required|string|max:10',
                'nominal' => 'required|numeric|digits_between:1, 8'
            ]);

            if ($validator->fails()) {
                $res['messages'] = "Data Tidak Valid";
                $res['error'] = $validator->messages();

                return response($res);
            }

            $data = $request->all();

    		if($spp->where('id_spp', '=', $id_spp)->update($data)){
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
    
    public function delete($id_spp){
    	$spp = t_spp::where('id_spp', '=', $id_spp)->first();

    	if($spp){
            if($spp->where('id_spp', '=', $id_spp)->delete()){
                $res['messages'] = 'Berhasil Menghapus Data';
                $res['value'] = $spp;
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
