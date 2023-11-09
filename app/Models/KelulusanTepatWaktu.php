<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KelulusanTepatWaktu extends Model
{
    use HasFactory;
    protected $table = "kelulusan_tepat_waktu";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_masuk', 'jml_mhs', 'tahun_lulus', 'jml_lulusan', 'wisuda_ke', 'masa_studi', 'jml_mhs_aktif', 'id_pt_unit'
    ];

    /**
     * The roles that belong to the KelulusanTepatWaktu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    // }
}
