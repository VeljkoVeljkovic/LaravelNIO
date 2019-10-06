<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnketaRecenzentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anketa_recenzent', function (Blueprint $table) {
            $table->bigIncrements('idAnketuRadi');
            $table->unsignedBigInteger('a_idAnketa');
            $table->foreign('a_idAnketa')
      ->references('idAnketa')->on('anketa')
      ->onDelete('cascade')->onUpdate('cascade');
           $table->unsignedBigInteger('r_idRecenzent');
            $table->foreign('r_idRecenzent')
      ->references('idRecenzent')->on('recenzenti')
      ->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
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
        Schema::dropIfExists('anketa_recenzent');
    }
}
