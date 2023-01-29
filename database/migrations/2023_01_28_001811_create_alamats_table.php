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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            $table->String('idUser');
            $table->String('nama_lengkap');
            $table->String('telp');
            $table->String('alamat');
            $table->String('id_provinsi');
            $table->String('id_kabupaten');
            $table->String('id_kecamatan');
            $table->String('id_desa');
            $table->String('other')->nullable();
            $table->String('default')->nullable();
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
        Schema::dropIfExists('alamats');
    }
};
