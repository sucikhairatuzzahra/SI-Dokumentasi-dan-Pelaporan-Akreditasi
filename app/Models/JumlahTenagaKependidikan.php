<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahTenagaKependidikan extends Model
{
    use HasFactory;
    protected $table = "jml_tng_kpddkn";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','jenis_tng_kpddkn','jenjang_pendidikan','unit_kerja'
    ];
}