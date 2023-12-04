<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PPKMDariDTPR extends Model
{
    use HasFactory;
    protected $table = "ppkm_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_ppkm','id_dosen',  'ketua', 'id_pt_unit'
    ];

    public function luaran(): BelongsTo
    {
        return $this->belongsTo(Luaran::class, 'id_luaran');
    }

    public function luaranLain(): BelongsTo
    {
        return $this->belongsTo(LuaranLain::class, 'id_luaran_lain');
    }

    // Relationship dengan model ptUnit
    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }


    public function dosens(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_dosen');
    }

    public function ppkm(): BelongsTo
    {
        return $this->belongsTo(PPKM::class, 'id_ppkm');
    }

}
