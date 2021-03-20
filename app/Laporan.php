<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'id_pelatih', 
        'id_atlit',
        'tanggal',
        'keterangan',
        'gaya',
        'nomor',
        'waktu'
    ];
}
