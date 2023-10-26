<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranPPKM extends Model
{
    use HasFactory;
    protected $table = "luaran_ppkm";
    protected $primaryKey = 'pk_id_luaran_ppkm';
    protected $fillable = [
        'tahun', 'id_ppkm', 'judul_luaran', 'id_jenis_luaran', 'jumlah_sitasi', 'kriteria'
    ];
}
