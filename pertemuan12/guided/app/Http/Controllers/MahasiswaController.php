<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Index untuk mahasiswa";
    }

   public function insertData()
    {
        $result = DB::table('mahasiswas')->insert([
        'nim' => '2211104065',
        'nama_lengkap' => 'Rengganis',
        'tanggal_lahir' => '28 september 1998',
        'tempat_lahir' => 'purwokerto',
        'alamat' => 'arca',
        'fakultas' => 'Informatika',
        'jurusan' => 'rpl',
    ]);
    dump($result);
    }
}
