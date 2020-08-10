<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaDesa extends Model
{
    //
    protected $table = 'kepala_desa';
    public $timestamps = false;

    protected $fillable = [
        'provinsi_id', 'kab_kota_id', 'kecamatan_id', 'kel_desa_id', 'nama_kades', 'no_hp_kades', 'password'
    ];
}
