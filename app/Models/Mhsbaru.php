<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exports\MahasiswaExport;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mhsbaru extends Model
{
    use HasFactory;
    protected $table = "cln_mhsbaru";
    protected $primaryKey = 'id';
    protected $fillable = [
        'thn_akademik', 'daya_tampung', 'pendaftar', 'lulus_seleksi', 'maba_reguler',
        'maba_transfer', 'mhs_aktif_reguler', 'mhs_aktif_transfer','pt_unit'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'pt_unit');
    }

    // Relationship dengan model ptUnit
    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }
   
     // Relationship dengan model tahunAkademik
     public function tahunAkademik(): BelongsTo
     {
         return $this->belongsTo(TahunAkademik::class, 'id_thn_akademik');
     }
}
