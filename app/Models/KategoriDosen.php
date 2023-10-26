<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDosen extends Model
{
    use HasFactory;
    protected $table = "kategori_dosen";
    protected $primaryKey = 'pk_id_kategori_dosen';
    protected $fillable = [
        'nama_kategori_dosen', 'kode_kategori_dosen'
    ];
}
