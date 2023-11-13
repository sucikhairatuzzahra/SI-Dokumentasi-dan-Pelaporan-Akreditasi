<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKerjaLulusan extends Model
{
    use HasFactory;
    protected $table = "bidang_kerja_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_lulus', 'jumlah_lulusan', 'lulusan_terlacak', 'bidang_infokom', 'non_infokom',
        'internasional', 'nasional', 'wirausaha','id_pt_unit'
    ];

    protected function id_pt_unit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }
}
