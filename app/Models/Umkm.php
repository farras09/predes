<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    //
    protected $table = 'umkm';
    public $timestamps = false;

    protected $fillable = [
        'kepala_desa_id', 'nama_umkm', 'nama_pemilik', 'kode_akses', 'nomor_wa', 'alamat'
    ];
}
