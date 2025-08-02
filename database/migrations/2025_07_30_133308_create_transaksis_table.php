<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipe_sepatu_id');
            $table->string('nota');
            $table->string('nama_pelanggan');
            $table->date('tgl_masuk');
            $table->date('estimasi_selesai')->nullable();
            $table->enum('status_bayar', ['selesai', 'belum', 'dibatalkan']);
            $table->integer('diskon')->nullable();
            $table->integer('jumlah');
            $table->integer('total_bayar');
            $table->enum('is_acc', ['Disetujui', 'Ditolak'])->nullable();
            $table->string('no_pelanggan');
            $table->string('alamat')->nullable();  
            $table->double('latitude')->nullable();  
            $table->double('longitude')->nullable();

            $table->timestamps();

            $table->foreign('tipe_sepatu_id')->references('id')->on('tipe_sepatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
