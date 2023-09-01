<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendanaan extends Model
{
    use HasFactory;
    protected $table = "pendanaan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'sumber_dana', 'jumlah', 'bukti', 'keterangan'
    ];
}
