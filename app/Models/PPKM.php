<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPKM extends Model
{
    use HasFactory;
    protected $table = "ppkm";
    protected $primaryKey = 'pk_id_ppkm';
    protected $fillable = [
        'tahun', 'judul', 'jenis_penelitian_pengabdian', 'id_jenis_sumber_pembiayaan', 'sumber_pembiayaan', 'kerjasama', 'id_kriteria'
    ];
}
