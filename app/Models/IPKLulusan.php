<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPKLulusan extends Model
{
    use HasFactory;
    protected $table = "ipk_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_lulus', 'jumlah_lulusan', 'ipk_min', 'ipk_rata_rata', 'ipk_max', 'pt_unit'
    ];
    public function idPtUnit(){
        return $this->belongsTo(PTUnit::class, 'pt_unit');
    }
}
