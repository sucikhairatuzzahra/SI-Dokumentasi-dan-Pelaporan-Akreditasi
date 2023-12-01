<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PPKMDariDTPR extends Model
{
    use HasFactory;
    protected $table = "ppkm_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dtpr', 'jenis_penelitian_pengabdian', 'judul', 'ketua',
        'jenis_luaran', 'jenis_luaran_lain', 'tahun', 'dana', 'bukti', 'id_pt_unit'
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
}
