<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;
    protected $table = "sarana_prasarana";
    protected $primaryKey = 'id';
    protected $fillable = [
        'sarana', 'daya_tampung', 'luas_ruang', 'jml_mhs', 'jam_lyn', 'perangkat'
    ];
}
