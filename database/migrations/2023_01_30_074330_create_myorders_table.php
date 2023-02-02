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
        Schema::create('myorders', function (Blueprint $table) {
            $table->id();
            $table->string('noPesanan');
            $table->string('idUser');
            $table->string('qty');
            $table->string('status')->default('unpaid');
            $table->string('statusorder');
            $table->string('notes');
            $table->string('pengiriman')->nullable();
            $table->string('Totalbayar');
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
        Schema::dropIfExists('myorders');
    }
};
