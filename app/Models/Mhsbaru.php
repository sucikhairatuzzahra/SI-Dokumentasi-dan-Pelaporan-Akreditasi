<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mhsbaru extends Model
{
    use HasFactory;
    protected $table = "cln_mhsbaru";
    protected $primaryKey = 'id';
    protected $fillable = [
        'thn_akademik', 'daya_tampung', 'pendaftar', 'lulus_seleksi', 'maba_reguler',
        'maba_transfer', 'mhs_aktif_reguler', 'mhs_aktif_transfer'
    ];
}
