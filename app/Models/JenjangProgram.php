<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenjangProgram extends Model
{
    use HasFactory;
    protected $table = "jenjang_program";
    protected $primaryKey = 'pk_id_jenjang_program';
    protected $fillable = [
        'kode_jenjang_program', 'nama_jenjang_program', 'aktif'
    ];
}
