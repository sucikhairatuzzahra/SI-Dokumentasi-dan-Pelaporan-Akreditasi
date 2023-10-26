<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranLainPPKM extends Model
{
    use HasFactory;
    protected $table = "luaran_lain_ppkm";
    protected $primaryKey = 'pk_id_luaran_lain_ppkm';
    protected $fillable = [
        'tahun', 'id_ppkm', 'id_jenis_luaran_lain', 'judul_luaran_lain', 'keterangan',
        'jumlah_sitasi', 'kriteria'
    ];
}
