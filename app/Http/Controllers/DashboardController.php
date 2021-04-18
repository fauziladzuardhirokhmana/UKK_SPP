<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_transaksi;

class DashboardController extends Controller
{
    public function history(Request $request){
        if($request->role == 'siswa'){
            $transaksi = t_transaksi::where('nis', '=', $request->nis)->orderBy(
                'tanggal_bayar', 'asc')->get();
        }
        else if($request->role == 'petugas' || $request->role == 'admin'){
            $transaksi = t_transaksi::orderBy('tanggal_bayar', 'asc')->get();
        }

        if($transaksi){
            if($transaksi->count()>0){
                $res['messages'] = 'Berhasil Mendapatkan History Pembayaran';
                $res['value'] = $transaksi;
            }
            else{
                $res['messages'] = "Tidak Ada Data";
            }
            
        }
        else{
            $res['messages'] = 'Gagal Mendapatkan History Pembayaran';
        }

        return response($res);
    }
}
