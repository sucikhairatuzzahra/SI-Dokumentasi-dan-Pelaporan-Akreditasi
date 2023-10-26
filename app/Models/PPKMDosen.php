<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPKMDosen extends Model
{
    use HasFactory;
    protected $table = "ppkm_dosen";
    protected $primaryKey = 'pk_id_ppkm_dosen';
    protected $fillable = [
        'id_luaran_ppkm', 'id_dosen', 'utama'
    ];
}
