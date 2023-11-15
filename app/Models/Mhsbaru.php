<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exports\MahasiswaExport;

class Mhsbaru extends Model
{
    use HasFactory;
    protected $table = "cln_mhsbaru";
    protected $primaryKey = 'id';
    protected $fillable = [
        'thn_akademik', 'daya_tampung', 'pendaftar', 'lulus_seleksi', 'maba_reguler',
        'maba_transfer', 'mhs_aktif_reguler', 'mhs_aktif_transfer','id_pt_unit'
    ];
    protected function idPtUnit (): CastsAttribute
    {
        return new CastsAttribute(
            get: fn ($value) => ['','PNP', 'SPM', 'JUR.TI', 'D4 TRPL', 'D3 MI','AKT','P3M'][$value],
        );
    }

     // Relationship dengan model TahunAkademik
     public function tahunAkademik()
     {
         return $this->belongsTo(TahunAkademik::class, 'thn_akademik');
     }



    // public function tahunAkademik()
    // {
    //     return $this->belongsTo(TahunAkademik::class);
    // }
}
