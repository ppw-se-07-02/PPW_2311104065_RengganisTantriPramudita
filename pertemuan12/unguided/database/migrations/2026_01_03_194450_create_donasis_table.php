<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('donasis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_donatur');
        $table->string('email');
        $table->decimal('jumlah_donasi', 12, 2);
        $table->string('metode_pembayaran');
        $table->text('pesan')->nullable();
        $table->date('tanggal_donasi');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('donasis');
}

};
