<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLuaran extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran";
    protected $primaryKey = 'pk_id_jenis_luaran';
    protected $fillable = [
        'jenis_luaran'
    ];
}
