<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PTUnit extends Model
{
    use HasFactory;
    protected $table = "pt_unit";
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_pt_unit', 'nama_pt_unit'
    ];
    
    public function users()
    {
        return $this->hasMany(User::class, 'id_pt_unit');
    }
    
    public function mhsBaru(): HasMany {
        return $this->hasMany(Mhsbaru::class, 'id_pt_unit');
    }
}   
