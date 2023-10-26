<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKependidikan extends Model
{
    use HasFactory;
    protected $table = "tenaga_kpddkn";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_tng_kpddkn', 'unit_kerja'
    ];

    public function lulusan()
    {
        return $this->hasOne(JumlahTenagaKependidikan::class);
    }
}
