<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BebanDTPR extends Model
{
    use HasFactory;
    protected $table = "beban_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dosen', 'pgjrn_ps_sendiri', 'pgjrn_ps_lain_pt_sendiri', 'pgjrn_pt_lain', 'sks_penelitian',
        'sks_penelitian', 'manajemen_pt_sendiri', 'manajemen_pt_lain'
    ];
}
