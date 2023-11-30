<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aksesibilitas extends Model
{
    use HasFactory;
    protected $table = "aksesibilitas";
    protected $primaryKey = 'id';
    protected $fillable = [
<<<<<<< HEAD
        'jenis_data', 'secara_manual', 'tanpa_jrg', 'lan', 'wan', 'id_pt_unit','kode_pt_unit'
=======
        'jenis_data', 'secara_manual', 'tanpa_jrg', 'lan', 'wan', 'id_pt_unit'
>>>>>>> origin/prefered_dev
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pt_unit');
<<<<<<< HEAD
=======
    }

    public function ptUnit(): BelongsTo
    {
        return $this->belongsTo(PTUnit::class, 'id_pt_unit');
>>>>>>> origin/prefered_dev
    }
}
