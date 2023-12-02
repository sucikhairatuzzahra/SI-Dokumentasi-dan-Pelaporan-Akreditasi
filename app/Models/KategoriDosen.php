<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriDosen extends Model
{
    use HasFactory;
    protected $table = "kategori_dosen";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori_dosen', 'kode_kategori_dosen'
    ];
    public function Dosen(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_kategori_dosen');
    }
}
