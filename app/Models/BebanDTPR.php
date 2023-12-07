<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BebanDTPR extends Model
{
    use HasFactory;
    protected $table = "beban_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_thn_akademik','id_dosen', 'pgjrn_ps_sendiri', 'pgjrn_ps_lain_pt_sendiri', 'pgjrn_pt_lain', 'sks_penelitian',
        'sks_pengabdian', 'manajemen_pt_sendiri', 'manajemen_pt_lain'
    ];

    // public function ptUnit(): BelongsTo {
    //     return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    // }

    public function dosens(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
      // Relationship dengan model tahunAkademik
      public function tahunAkademik(): BelongsTo
      {
          return $this->belongsTo(TahunAkademik::class, 'id_thn_akademik');
      }


}
