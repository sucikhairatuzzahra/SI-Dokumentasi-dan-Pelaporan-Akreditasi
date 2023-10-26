<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTUnit extends Model
{
    use HasFactory;
    protected $table = "pt_unit";
    protected $primaryKey = 'pk_id_pt_unit';
    protected $fillable = [
        'kode_pt_unit', 'nama_pt_unit', 'induk_pt_unit', 'id_level_pt_unit', 'id_jenjang_program'
    ];
}
