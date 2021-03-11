<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'email', 
        'nama',
        'telp',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'pelatih',
        'foto',
        'bukti',
        'riwayat',
        'alasan'
    ];
}
