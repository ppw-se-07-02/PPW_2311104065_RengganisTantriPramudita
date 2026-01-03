<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Import Model Mahasiswa agar bisa digunakan
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Index untuk mahasiswa";
    }

    // Menambah data menggunakan Eloquent (sesuai gambar terakhir)
    public function insertEloquent()
    {
        $mhs = Mahasiswa::create([
            'nim'           => '20104080',
            'nama_lengkap'  => 'Rizky Ananda',
            'tempat_lahir'  => 'Malang',
            'tanggal_lahir' => '2002-09-12',
            'alamat'        => 'Jl. Kenanga No. 7',
            'fakultas'      => 'Fakultas Informatika',
            'jurusan'       => 'Software Engineering',
        ]);
        
        dump($mhs);
    }

    // Menambah data menggunakan Query Builder
    public function insertData()
    {
        $result = DB::table('mahasiswas')->insert([
            'nim'           => '2211104065',
            'nama_lengkap'  => 'Rengganis',
            'tanggal_lahir' => '1998-09-28',
            'tempat_lahir'  => 'Purwokerto',
            'alamat'        => 'Arca',
            'fakultas'      => 'Informatika',
            'jurusan'       => 'RPL',
        ]);

        dump($result);
    }

    // Menampilkan data
    public function selectData()
    {
        $allMahasiswa = DB::table('mahasiswas')->get();
        dump($allMahasiswa);
    }

    // Mengupdate data
    public function updateData()
    {
        $result = DB::table('mahasiswas')
            ->where('nim', '2211104065')
            ->update(['nama_lengkap' => 'Rengganis Update']);
            
        dump($result);
    }

    // Menghapus data
    public function deleteData()
    {
        $result = DB::table('mahasiswas')
            ->where('nim', '2211104065')
            ->delete();
            
        dump($result);
    }
}