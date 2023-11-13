<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BebanDTPR extends Model
{
    use HasFactory;
    protected $table = "beban_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dosen', 'pgjrn_ps_sendiri', 'pgjrn_ps_lain_pt_sendiri', 'pgjrn_pt_lain', 'sks_penelitian',
        'sks_penelitian', 'manajemen_pt_sendiri', 'manajemen_pt_lain','id_pt_unit'
    ];

    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
