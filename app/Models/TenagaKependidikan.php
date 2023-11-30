<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenagaKependidikan extends Model
{
    use HasFactory;



    protected $table = "tenaga_kpddkn";
    protected $primaryKey = 'id';
    protected $fillable = [
<<<<<<< HEAD
        'nama','jenis_tenaga_kependidikan','jenjang_pendidikan', 'id_pt_unit','kode_pt_unit'
=======
        'nama', 'jenis_tenaga_kependidikan', 'jenjang_pendidikan', 'id_pt_unit'
>>>>>>> origin/prefered_dev
    ];

    public function lulusan()
    {
        return $this->hasOne(JumlahTenagaKependidikan::class);
    }
<<<<<<< HEAD
    //
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
    }

 
=======
    
    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }
>>>>>>> origin/prefered_dev
}
