<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuaranLain extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran_lain";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_luaran_lain'
    ];
}