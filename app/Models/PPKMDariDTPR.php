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
        'pkm_infokom_adobsi', 'pkm_infokom_hki','id_pt_unit'
    ];
    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
