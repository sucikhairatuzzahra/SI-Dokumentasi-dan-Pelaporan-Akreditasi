<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MasaTungguLulusan extends Model
{
    use HasFactory;
    protected $table = "masa_tunggu_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_thn_akademik', 'waktu_tunggu', 'id_pt_unit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit', 'kode_pt_unit');
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
