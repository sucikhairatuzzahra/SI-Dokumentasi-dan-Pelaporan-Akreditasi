<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSumberPembiayaan extends Model
{
    use HasFactory;
    protected $table = "jenis_sumber_pembiayaan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_sumber_pembiayaan'
    ];
}
