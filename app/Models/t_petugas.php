<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_petugas extends Model
{
    public $table = 't_petugas';

    protected $fillable = [
    	'nip', 'nama_petugas', 'password', 'role'
    ];
}
