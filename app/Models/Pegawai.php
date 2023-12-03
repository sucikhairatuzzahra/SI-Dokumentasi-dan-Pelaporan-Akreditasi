<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pegawai', 'tanggal_lahir', 'nip', 'aktif'
    ];
    public function Dosen(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_pegawai','nama_dosen');
    }
}
