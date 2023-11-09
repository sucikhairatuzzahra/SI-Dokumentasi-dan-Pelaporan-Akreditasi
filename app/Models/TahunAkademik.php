<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $table = "tahun_akademik";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_akademik'
    ];
    //controllernya di admincontroller
}
