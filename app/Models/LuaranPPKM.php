<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LuaranPPKM extends Model
{
    use HasFactory;
    protected $table = "luaran_ppkm";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun','id_ppkm','id_jenis_luaran','judul_luaran_ppkm','jumlah_sitasi'
    ];

    public function jenisLuaran(): BelongsTo
    {
        return $this->belongsTo(JenisLuaran::class, 'id_jenis_luaran');
    }

    public function luaranPpkmDosen(): HasMany
    {
        return $this->hasMany(LuaranPPKMDosen::class, 'id_luaran_ppkm');
    }
    
    public function ppkm(): BelongsTo
    {
        return $this->belongsTo(PPKM::class, 'id_ppkm');
    }
}
