<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaran extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_luaran'
    ];
}
