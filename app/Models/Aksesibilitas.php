<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesibilitas extends Model
{
    use HasFactory;
    protected $table = "aksesibilitas";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_data', 'secara_manual', 'tanpa_jrg', 'lan', 'wan', 'id_pt_unit'
    ];

    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
