<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasis';

    protected $fillable = [
        'nama_donatur',
        'email',
        'jumlah_donasi',
        'metode_pembayaran',
        'pesan',
        'tanggal_donasi',
    ];
}

