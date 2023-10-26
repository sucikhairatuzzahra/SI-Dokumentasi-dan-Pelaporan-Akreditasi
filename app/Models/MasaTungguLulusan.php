<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasaTungguLulusan extends Model
{
    use HasFactory;
    protected $table = "masa_tunggu_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_lulus', 'waktu_tunggu'
    ];
}
