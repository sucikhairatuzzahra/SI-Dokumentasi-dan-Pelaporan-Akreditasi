<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKerjaLulusan extends Model
{
    use HasFactory;
    protected $table = "bidang_kerja_lulusan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_lulus', 'jumlah_lulusan', 'lulusan_terlacak', 'bidang_infokom', 'non_infokom',
        'internasional', 'nasional', 'wirausaha'
    ];
}
