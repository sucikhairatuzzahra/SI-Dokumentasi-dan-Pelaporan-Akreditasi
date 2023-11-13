<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKependidikan extends Model
{
    use HasFactory;
    protected $table = "tenaga_kpddkn";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','jenis_tng_kpddkn','jenjang_pendidikan', 'unit_kerja', 'id_pt_unit'
    ];

    public function lulusan()
    {
        return $this->hasOne(JumlahTenagaKependidikan::class);
    }
    //
    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
    
}
