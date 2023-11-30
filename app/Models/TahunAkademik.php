<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $table = "tahun_akademik";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_akademik'
    ];
    //controllernya di admincontroller
    public function mhsBaru(): HasMany {
        return $this->hasMany(MhsBaru::class, 'id_thn_akademik');
    }
}
