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
        'nama_dosen', 'nomor_induk_dosen', 'jenis_nomor_induk_dosen', 'id_level_pendidikan_tertinggi',
        'pendidikan_magister','pendidikan_doktor', 'bidang_keahlian', 'jabatan_akademik',
        'id_pegawai','id_pt_unit','id_kategori_dosen'
    ];

    public function idPegawai()
    {
         return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
     
     public function idKatDosen()
    {
         return $this->belongsTo(KategoriDosen::class, 'id_kategori_dosen');
    }

    public function idPtUnit()
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }

    public function idLevelPddkn()
    {
        return $this->belongsTo(PTUnit::class, 'id_level_pendidikan_tertinggi');
    }
}
