<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Route::get('/home', fn() => 'Halaman Home');
Route::get('/about', fn() => 'Halaman About');
Route::get('/contact', fn() => 'Halaman Contact');
Route::get('/profile', fn() => 'Halaman Profile');
Route::get('/help', fn() => 'Halaman Help');

Route::get('/kendaraan/{jenis?}', fn($jenis='motor') => $jenis);
Route::get('/buku/{judul?}/{penulis?}', fn($j='Laravel',$p='Anonim') => "$j - $p");
Route::get('/nilai/{angka?}', fn($a=0) => "Nilai $a");

Route::get('/kendaraan/{jenis?}', fn($jenis='motor') => $jenis);
Route::get('/buku/{judul?}/{penulis?}', fn($j='Laravel',$p='Anonim') => "$j - $p");
Route::get('/nilai/{angka?}', fn($a=0) => "Nilai $a");

Route::get('/asset', fn() => view('asset'));

Route::get('/mahasiswa', function () {
  $nilai = [80,64,30,76,95];
  return view('mahasiswa', compact('nilai'));
});

Route::get('/', [PageController::class,'index']);