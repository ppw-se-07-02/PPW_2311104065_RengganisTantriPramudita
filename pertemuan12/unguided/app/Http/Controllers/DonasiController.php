<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function insertSql()
    {
        $result = DB::insert("
            INSERT INTO donasis
            (nama_donatur, email, jumlah_donasi, metode_pembayaran, pesan, tanggal_donasi)
            VALUES
            ('Rengganis Tantri', 'rengganis@gmail.com', 50000,
             'Tunai', 'Semoga bermanfaat', CURDATE())
        ");

        dump($result);
    }

    public function insertQB()
{
    $result = DB::table('donasis')->insert([
        'nama_donatur' => 'Aulia Putri',
        'email' => 'aulia@gmail.com',
        'jumlah_donasi' => 100000,
        'metode_pembayaran' => 'Transfer',
        'pesan' => 'Untuk kemanusiaan',
        'tanggal_donasi' => now(),
    ]);

    dump($result);
}

public function insertEloquent()
{
    $donasi = Donasi::create([
        'nama_donatur' => 'Rizky Ananda',
        'email' => 'rizky@gmail.com',
        'jumlah_donasi' => 75000,
        'metode_pembayaran' => 'Tunai',
        'pesan' => 'Ikhlas',
        'tanggal_donasi' => now(),
    ]);

    dump($donasi);
}

}
