<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasaTungguLulusan extends Model
{
    use HasFactory;
    protected $table = "masa_tunggu_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_lulus', 'waktu_tunggu', 'pt_unit'
    ];
    public function idPtUnit(){
        return $this->belongsTo(PTUnit::class, 'pt_unit');
    }
}
