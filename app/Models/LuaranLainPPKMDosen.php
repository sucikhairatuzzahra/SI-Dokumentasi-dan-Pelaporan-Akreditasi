<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LuaranLainPPKMDosen extends Model
{
    use HasFactory;
    protected $table = "luaran_lain_ppkm_dosen";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_luaran_lain_ppkm','id_dosen'
    ];

    public function dosens(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function luaranLainPpkm(): BelongsTo
    {
        return $this->belongsTo(LuaranPPKM::class, 'id_luaran_lain_ppkm');
    }
}
