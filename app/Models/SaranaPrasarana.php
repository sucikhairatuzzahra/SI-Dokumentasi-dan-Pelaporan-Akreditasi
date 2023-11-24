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
        'sarana', 'daya_tampung', 'luas_ruang', 'jml_mhs', 'jam_lyn', 'perangkat','pt_unit'
    ];
    
    public function idPtUnit(){
        return $this->belongsTo(PTUnit::class, 'pt_unit');
    }
}
