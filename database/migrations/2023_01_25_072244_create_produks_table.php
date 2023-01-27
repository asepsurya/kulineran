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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('namaProduk');
            $table->string('idSupplier');
            $table->string('status');
            $table->string('harga');
            $table->string('idKategori');
            $table->string('varian')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('gambar');
            $table->integer('idUser');
            $table->string('rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
