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
        'jenis_kemampuan', 'sangat_baik', 'baik', 'cukup', 'kurang', 'rencana_tindak_lanjut','id_pt_unit'
    ];
    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
