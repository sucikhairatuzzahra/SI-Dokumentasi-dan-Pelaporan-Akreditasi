<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranPPKMDosen extends Model
{
    use HasFactory;
    protected $table = "luaran_ppkm_dosen";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_luaran_ppkm','id_dosen'
    ];
}
