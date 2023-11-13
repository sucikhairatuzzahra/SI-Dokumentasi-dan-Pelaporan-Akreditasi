<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;
    protected $table = "sarana_prasarana";
    protected $primaryKey = 'id';
    protected $fillable = [
        'sarana', 'daya_tampung', 'luas_ruang', 'jml_mhs', 'jam_lyn', 'perangkat','id_pt_unit'
    ];
    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
