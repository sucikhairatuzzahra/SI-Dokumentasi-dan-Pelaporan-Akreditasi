<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $table = "tahun_akademik";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_akademik','tahun'
    ];
    //controllernya di admincontroller
   
    public function mhsBaru(): HasMany {
        return $this->hasMany(MhsBaru::class, 'id_thn_akademik');
    }
    public function masaTunggu(): HasMany {
        return $this->hasMany(MasaTungguLulusan::class, 'id_thn_akademik');
    }
    public function bebanDtpr(): HasMany {
        return $this->hasMany(BebanDTPR::class, 'id_thn_akademik');
    }
    public function ipk(): HasMany {
        return $this->hasMany(IPKLulusan::class, 'id_thn_akademik');
    }
    public function kerjaLulusan(): HasMany {
        return $this->hasMany(BidangKerjaLulusan::class, 'id_thn_akademik');
    }
}
