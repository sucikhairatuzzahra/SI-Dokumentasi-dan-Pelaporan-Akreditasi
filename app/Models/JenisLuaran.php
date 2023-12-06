<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisLuaran extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_luaran'
    ];

    public function luaranPpkm(): HasMany
    {
        return $this->hasMany(LuaranPPKM::class, 'id_jenis_luaran');
    }
}
