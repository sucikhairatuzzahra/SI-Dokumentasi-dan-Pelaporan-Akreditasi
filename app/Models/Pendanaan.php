<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendanaan extends Model
{
    use HasFactory;
    protected $table = "pendanaan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'sumber_dana', 'jumlah', 'bukti', 'keterangan','pt_unit'
    ];
  
    public function idPtUnit(){
        return $this->belongsTo(PTUnit::class, 'pt_unit');
    }
}
