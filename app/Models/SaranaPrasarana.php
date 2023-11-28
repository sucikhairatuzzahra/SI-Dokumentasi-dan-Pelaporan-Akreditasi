<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;
    protected $table = "sarana_prasarana";
    protected $primaryKey = 'id';
    protected $fillable = [
        'sarana', 'daya_tampung', 'luas_ruang', 'jml_mhs', 'jam_lyn', 'perangkat','id_pt_unit','kode_pt_unit'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
    }
}
