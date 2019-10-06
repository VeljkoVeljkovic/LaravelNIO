<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnketaOdgovoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anketa_odgovori', function (Blueprint $table) {
            $table->bigIncrements('idOdgovor');
            $table->string('odgovor')->nullable();
            $table->unsignedBigInteger('anketa_idPitanje');
            $table->foreign('anketa_idPitanje')
      ->references('idPitanje')->on('anketa_pitanja')
      ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('anketa_idAnketuRadi');
            $table->foreign('anketa_idAnketuRadi')
      ->references('idAnketuRadi')->on('anketa_recenzent')
      ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('anketa_odgovori');
    }
}
