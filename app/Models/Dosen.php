<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $primaryKey = 'id';

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        // 'nomor_induk_dosen', 'jenis_nomor_induk_dosen', 'id_level_pendidikan_tertinggi',
        // 'pendidikan_magister', 'pendidikan_doktor', 'bidang_keahlian', 'jabatan_akademik',
        // 'id_pegawai', 'id_pt_unit', 'id_kategori_dosen'
    ];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function kategoriDosen(): BelongsTo
    {
        return $this->belongsTo(KategoriDosen::class, 'id_kategori_dosen');
    }

    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }

    public function levelPddkn(): BelongsTo
    {
        return $this->belongsTo(LevelPendidikanTertinggi::class, 'id_level_pendidikan_tertinggi');
    }

    public function bebanDtpr(): HasMany
    {
        return $this->hasMany(BebanDTPR::class, 'id_dosen');
    }
    public function ppkmDtpr(): HasMany
    {
        return $this->hasMany(PPKMDariDTPR::class, 'id_dosen');
    }
}
