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
        'nama_dtpr', 'publikasi_infokom', 'penelitian_infokom', 'penelitian_infokom_hki', 
        'pkm_infokom_adobsi', 'pkm_infokom_hki','pt_unit'
    ];
    public function idPtUnit(){
        return $this->belongsTo(PTUnit::class, 'pt_unit');
    }
}
