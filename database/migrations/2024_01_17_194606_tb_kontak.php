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



    // "nama" => null
    // "nomor" => null
    // "email" => null
    // "pesan" => null
    // "button" => null
    public function up()
    {
        Schema::create('tb_kontak', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            // $table->string('nama', 30);
            $table->string('nomor');
            // $table->string('nomor', 16);
            $table->string('email');
            $table->string('pesan');
            // $table->string('pesan', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kontak');
    }
};
