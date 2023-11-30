<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = 'pk_id_pegawai';
    protected $fillable = [
        'nama_pegawai', 'tanggal_lahir', 'nip', 'aktif'
    ];
}
