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
<<<<<<< HEAD
        'nama_dtpr', 'jenis_penelitian_pengabdian', 'judul', 'ketua', 
        'jenis_luaran', 'jenis_luaran_lain','tahun','dana', 'bukti','id_pt_unit','kode_pt_unit'
    ];
    // public function idPtUnit(){
    //     return $this->belongsTo(PTUnit::class, 'pt_unit');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
=======
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
>>>>>>> origin/prefered_dev
    }

    public function luaran()
    {
        return $this->belongsTo(Luaran::class, 'jenis_luaran');
    }

    public function luaranLain()
    {
        return $this->belongsTo(LuaranLain::class, 'jenis_luaran_lain');
    }

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'id_pt_unit');
    // }
}
