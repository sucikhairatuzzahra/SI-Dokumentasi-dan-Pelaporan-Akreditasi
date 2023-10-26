<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPendidikanTertinggi extends Model
{
    use HasFactory;
    protected $table = "level_pendidikan_tertinggi";
    protected $primaryKey = 'pk_id_level_pendidikan_tertinggi';
    protected $fillable = [
        'nama_level_pendidikan', 'kode_level_pendidikan'
    ];
}
