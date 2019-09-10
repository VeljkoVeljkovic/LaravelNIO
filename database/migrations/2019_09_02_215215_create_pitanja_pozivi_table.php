<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitanjaPoziviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitanja_pozivi', function (Blueprint $table) {
            $table->bigIncrements('idPitanja');
            $table->string('pitanje');
            $table->timestamps();
            $table->unsignedBigInteger('pozivi_idPoziv');
            $table->foreign('pozivi_idPoziv')
      ->references('idPoziv')->on('pozivi')
      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pitanja_pozivi');
    }
}
