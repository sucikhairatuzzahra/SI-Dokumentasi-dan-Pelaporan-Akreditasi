<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BebanDTPR extends Model
{
    use HasFactory;
    protected $table = "beban_dtpr";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dosen', 'pgjrn_ps_sendiri', 'pgjrn_ps_lain_pt_sendiri', 'pgjrn_pt_lain', 'sks_penelitian',
        'sks_penelitian', 'manajemen_pt_sendiri', 'manajemen_pt_lain','id_pt_unit','kode_pt_unit'
    ];

<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
=======
    public function ptUnit(): BelongsTo {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
>>>>>>> origin/prefered_dev
    }

}
