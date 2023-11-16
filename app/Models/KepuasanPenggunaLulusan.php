<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepuasanPenggunaLulusan extends Model
{
    use HasFactory;
    protected $table = "kepuasan_pengguna_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_kemampuan', 'sangat_baik', 'baik', 'cukup', 'kurang', 'rencana_tindak_lanjut','pt_unit'
    ];
   
    
    public function idPtUnit(){
        return $this->belongsTo(PTUnit::class, 'pt_unit');
    }
}
