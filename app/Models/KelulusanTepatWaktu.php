<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KelulusanTepatWaktu extends Model
{
    use HasFactory;
    protected $table = "kelulusan_tepat_waktu";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_masuk', 'jml_mhs', 'tahun_lulus', 'jml_lulusan', 'wisuda_ke', 'masa_studi', 
        'jml_mhs_aktif', 'id_pt_unit','kode_pt_unit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
    }

}
