<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PPKMDosen extends Model
{
    use HasFactory;
    protected $table = "ppkm_dosen";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_ppkm','id_dosen',  'ketua'
    ];

  

    // Relationship dengan model ptUnit
    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
    }

    public function dosens(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function ppkm(): BelongsTo
    {
        return $this->belongsTo(PPKM::class, 'id_ppkm');
    }

}
