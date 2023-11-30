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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20);
            $table->string('judul', 255);
            $table->integer('kategori_id');
            $table->integer('penerbit_id');
            $table->string('isbn', 100);
            $table->string('pengarang', 255);
            $table->integer('jumlah_halaman');
            $table->integer('stok');
            $table->integer('tahun_terbit');
            $table->text('sinopsis');
            $table->string('gambar', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
