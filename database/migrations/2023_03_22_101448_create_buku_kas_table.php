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
        Schema::create('buku_kas', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('jenisTrans');
            $table->string('id_rekening');
            $table->string('id_kategori')->nullable();
            $table->string('Debet')->nullable();
            $table->string('Kredit')->nullable();
            $table->string('keterangan');
            $table->string('user');
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
        Schema::dropIfExists('buku_kas');
    }
};
