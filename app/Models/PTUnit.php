<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;

class PTUnit extends Model
{
    use HasFactory;
    protected $table = "pt_unit";
    protected $primaryKey = 'pk_id_pt_unit';
    protected $fillable = [
        'kode_pt_unit', 'nama_pt_unit', 'induk_pt_unit', 'id_level_pt_unit', 'id_jenjang_program'
    ];
    
    protected function pk_id_pt_unit (){
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
