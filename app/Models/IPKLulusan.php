<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPKLulusan extends Model
{
    use HasFactory;
    protected $table = "ipk_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_lulus', 'jumlah_lulusan', 'ipk_min', 'ipk_rata_rata', 'ipk_max'
    ];
}
