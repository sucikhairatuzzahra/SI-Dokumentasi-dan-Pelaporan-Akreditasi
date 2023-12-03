<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PPKM extends Model
{
    use HasFactory;
    protected $table = "ppkm";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun', 'judul', 'jenis_penelitian_pengabdian', 'id_jenis_sumber_pembiayaan', 'sumber_pembiayaan'
    ];

    public function pembiayaan(): BelongsTo
    {
        return $this->belongsTo(JenisSumberPembiayaan::class, 'id_jenis_sumber_pembiayaan');
    }

    public function aksesibilitas(): HasMany
    {
        return $this->hasMany(PPKMDariDTPR::class, 'id_ppkm');
    }

    
}
