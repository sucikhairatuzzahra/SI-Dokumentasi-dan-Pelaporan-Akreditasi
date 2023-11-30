<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendanaan extends Model
{
    use HasFactory;
    protected $table = "pendanaan";
    protected $primaryKey = 'id';
    protected $fillable = [
<<<<<<< HEAD
        'sumber_dana', 'jumlah', 'bukti', 'keterangan','id_pt_unit','kode_pt_unit'
    ];
  
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit','kode_pt_unit');
=======
        'sumber_dana', 'jumlah', 'bukti', 'keterangan','id_pt_unit'
    ];
  
    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
>>>>>>> origin/prefered_dev
    }
}
