<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_spp extends Model
{
    public $table = 't_spp';

    protected $fillable = [
    	'id_spp', 'tahun_ajaran', 'nominal'
    ];
}
