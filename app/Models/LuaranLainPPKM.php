<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LuaranLainPPKM extends Model
{
    use HasFactory;
    protected $table = "luaran_lain_ppkm";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun','id_ppkm','id_jenis_luaran_lain','judul_luaran_lain','keterangan','jumlah_sitasi'
    ];

    public function jenisLuaranLain(): BelongsTo
    {
        return $this->belongsTo(JenisLuaranLain::class, 'id_jenis_luaran_lain');
    }

    public function luaranLainPpkmDosen(): HasMany
    {
        return $this->hasMany(LuaranLainPPKMDosen::class, 'id_luaran_lain_ppkm');
    }
    
    public function ppkm(): BelongsTo
    {
        return $this->belongsTo(PPKM::class, 'id_ppkm');
    }
}
