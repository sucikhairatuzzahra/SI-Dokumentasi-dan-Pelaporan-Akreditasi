<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPKMDariDTPR extends Model
{
    use HasFactory;
    protected $table = "ppkm_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dtpr', 'jenis_penelitian_pengabdian', 'judul', 'ketua', 
        'jenis_luaran', 'jenis_luaran_lain','tahun','dana', 'bukti','id_pt_unit','kode_pt_unit'
    ];
    // public function idPtUnit(){
    //     return $this->belongsTo(PTUnit::class, 'pt_unit');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
    }

    public function luaran()
    {
        return $this->belongsTo(Luaran::class, 'jenis_luaran');
    }

    public function luaranLain()
    {
        return $this->belongsTo(LuaranLain::class, 'jenis_luaran_lain');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nama_dtpr');
    }
}
