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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('transaksi_data');
            $table->enum('status', ['terbayar', "menunggu", 'belum_terbayar'])->default('belum_terbayar');
            $table->enum('tipe_pembayaran', ['transfer', "tunai", 'kredit'])->default('transfer');
            $table->string('total_harga');
            $table->timestamp('tanggal_pesan')->default(now());
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('gambar')->nullable();
            $table->time('reminder')->nullable();
            $table->string('keterangan')->nullable();
            // $table->string('keterangan', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
