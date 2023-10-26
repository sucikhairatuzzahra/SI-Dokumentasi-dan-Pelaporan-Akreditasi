<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPTUnit extends Model
{
    use HasFactory;
    protected $table = "level_pt_unit";
    protected $primaryKey = 'pk_id_level_pt_unit';
    protected $fillable = [
        'kode_level_pt_unit', 'nama_level_pt_unit', 'induk_level_pt_unit', 'jenis_level_pt_unit', 'aktif'
    ];
}
