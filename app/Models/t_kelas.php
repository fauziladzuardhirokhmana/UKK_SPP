<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_kelas extends Model
{
    public $table = 't_kelas';

    protected $fillable = [
    	'id_kelas', 'tahun_ajaran', 'jurusan', 'nama_kelas'
    ];
}
