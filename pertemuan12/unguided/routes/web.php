<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;

Route::get('/donasi-raw', [DonasiController::class, 'insertSql']);

Route::get('/donasi-qb', [DonasiController::class, 'insertQB']);
