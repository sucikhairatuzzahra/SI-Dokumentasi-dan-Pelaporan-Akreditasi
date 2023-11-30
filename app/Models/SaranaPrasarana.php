<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaranaPrasarana extends Model
{
    use HasFactory;
    protected $table = "sarana_prasarana";
    protected $primaryKey = 'id';
    protected $fillable = [
<<<<<<< HEAD
        'sarana', 'daya_tampung', 'luas_ruang', 'jml_mhs', 'jam_lyn', 'perangkat','id_pt_unit','kode_pt_unit'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
=======
        'sarana', 'daya_tampung', 'luas_ruang', 'jml_mhs', 'jam_lyn', 'perangkat', 'id_pt_unit'
    ];

    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
>>>>>>> origin/prefered_dev
    }
}
