<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
<<<<<<<< HEAD:app/Models/Pegawai.php
=======
>>>>>>> origin/prefered_dev
class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = 'pk_id_pegawai';
    protected $fillable = [
<<<<<<< HEAD
        'nama_pegawai', 'tanggal_lahir','nip','aktif'
========
class LuaranLain extends Model
{
    use HasFactory;
    protected $table = "jenis_luaran_lain";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_luaran_lain'
>>>>>>>> origin/prefered_dev:app/Models/LuaranLain.php
=======
        'nama_pegawai', 'tanggal_lahir', 'nip', 'aktif'
>>>>>>> origin/prefered_dev
    ];
}
