<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahTenagaKependidikan extends Model
{
    use HasFactory;
    protected $table = "jml_tng_kpddkn";
    protected $primaryKey = 'id';
    protected $fillable = [
        'sma', 'd1', 'd2', 'd3', 'd4', '21', 's2', 's3'
    ];
}
