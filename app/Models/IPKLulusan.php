<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IPKLulusan extends Model
{
    use HasFactory;
    protected $table = "ipk_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        // 'id_thn_akademik' sebelumnya adalah tahun_lulus
        'id_thn_akademik', 'jumlah_lulusan', 'ipk_min', 'ipk_rata_rata', 'ipk_max', 'id_pt_unit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit');
    }

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
