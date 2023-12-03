<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisSumberPembiayaan extends Model
{
    use HasFactory;
    protected $table = "jenis_sumber_pembiayaan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_sumber_pembiayaan'
    ];

    public function ppkm(): HasMany
    {
        return $this->hasMany(PPKM::class, 'id_jenis_sumber_pembiayaan');
    }
}
