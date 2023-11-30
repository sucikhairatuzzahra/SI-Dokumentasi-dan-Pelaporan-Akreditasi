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
        'tahun_lulus', 'jumlah_lulusan', 'ipk_min', 'ipk_rata_rata', 'ipk_max', 'id_pt_unit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit', 'kode_pt_unit');
    }

    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }
}
