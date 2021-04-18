<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_siswa extends Model
{
    public $table = 't_siswa';

    protected $fillable = [
    	'nis', 'nisn', 'nama_siswa', 'id_kelas', 'alamat', 'no_tlp'
    ];
}
