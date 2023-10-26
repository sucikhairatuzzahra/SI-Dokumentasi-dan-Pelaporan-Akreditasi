<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesibilitas extends Model
{
    use HasFactory;
    protected $table = "aksesibilitas";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_data', 'secara_manual', 'tanpa_jrg', 'lan', 'wan', 'id_pt_unit'
    ];
}
