<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KepuasanPenggunaLulusan extends Model
{
    use HasFactory;
    protected $table = "kepuasan_pengguna_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_kemampuan', 'sangat_baik', 'baik', 'cukup', 'kurang', 'rencana_tindak_lanjut',
<<<<<<< HEAD
        'id_pt_unit','kode_pt_unit'
    ];
   
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
=======
        'id_pt_unit', 'kode_pt_unit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit', 'kode_pt_unit');
    }

    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
>>>>>>> origin/prefered_dev
    }
}
