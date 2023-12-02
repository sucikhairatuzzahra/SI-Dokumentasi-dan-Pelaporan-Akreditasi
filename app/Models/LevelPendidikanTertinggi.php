<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelPendidikanTertinggi extends Model
{
    use HasFactory;
    protected $table = "level_pendidikan_tertinggi";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_level_pendidikan', 'kode_level_pendidikan'
    ];
    public function Dosen(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_level_pendidikan_tertinggi');
    }
}
