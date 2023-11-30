<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KelulusanTepatWaktu extends Model
{
    use HasFactory;
    protected $table = "kelulusan_tepat_waktu";
    protected $primaryKey = 'id';
    protected $fillable = [
<<<<<<< HEAD
        'tahun_masuk', 'jml_mhs', 'tahun_lulus', 'jml_lulusan', 'wisuda_ke', 'masa_studi', 
        'jml_mhs_aktif', 'id_pt_unit','kode_pt_unit'
=======
        'tahun_masuk', 'jml_mhs', 'tahun_lulus', 'jml_lulusan', 'wisuda_ke', 'masa_studi',
        'jml_mhs_aktif', 'id_pt_unit'
>>>>>>> origin/prefered_dev
    ];

    public function user()
    {
<<<<<<< HEAD
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
=======
        return $this->belongsTo(User::class, 'id_pt_unit');
    }

    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
>>>>>>> origin/prefered_dev
    }

}
