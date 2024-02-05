<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_layanan', function (Blueprint $table) {
            $table->id();
            // $table->string('nama_alat');
            $table->string('nama_alat', 50);
            // $table->string('deskripsi_layanan');
            $table->string('deskripsi_layanan', 200);
            $table->string('harga_layanan');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('id')->on('tb_kategori');
            $table->string('gambar');
            $table->timestamps(); // Tambahkan timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_layanan');
    }
};
