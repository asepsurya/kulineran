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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('noPesanan');
            $table->string('idProduk');
            $table->string('varian');
            $table->string('qty');
            $table->string('Totalbayar');
            $table->string('ongkir');
            $table->string('diskon')->nullable();
            $table->string('pengiriman')->nullable();
            $table->string('idUser');
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
        Schema::dropIfExists('pesanans');
    }
};
