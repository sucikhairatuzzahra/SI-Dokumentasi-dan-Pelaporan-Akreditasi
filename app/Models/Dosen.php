<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dosen', 'nomor_induk_dosen', 'jenis_nomor_induk_dosen', 'pendidikan_magister',
        'pendidikan_doktor', 'bidang_keahlian', 'jabatan_akademik', 'sertifikat_pendidik_profesional',
        'sertifikat_kompetensi_profesi_industri'
    ];
}
