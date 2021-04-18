<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_transaksi extends Model
{
    public $table = 't_transaksi';

    protected $fillable = [
    	'no_struk', 'nip', 'nis', 'id_spp', 'tanggal_bayar', 'file'
    ];
}
