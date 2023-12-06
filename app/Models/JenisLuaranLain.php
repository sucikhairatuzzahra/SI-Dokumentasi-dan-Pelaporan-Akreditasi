<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisLuaranLain extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran_lain";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_luaran_lain'
    ];

    public function luaranLainPpkm(): HasMany
    {
        return $this->hasMany(LuaranLainPPKM::class, 'id_jenis_luaran_lain');
    }
}
