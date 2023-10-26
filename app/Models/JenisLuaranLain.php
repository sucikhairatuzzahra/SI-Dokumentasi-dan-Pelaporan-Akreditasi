<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLuaranLain extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran_lain";
    protected $primaryKey = 'pk_id_jenis_luaran_lain';
    protected $fillable = [
        'jenis_luaran_lain'
    ];
}
