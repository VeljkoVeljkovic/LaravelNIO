<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObavestenjaRecenzentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obavestenja_recenzent', function (Blueprint $table) {
            $table->bigIncrements('idObavRec');
            $table->unsignedBigInteger('o_idRecenzent');
            $table->foreign('o_idRecenzent')
       ->references('idRecenzent')->on('recenzenti')
       ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('o_idObavestenja');
            $table->foreign('o_idObavestenja')
       ->references('idObavestenja')->on('obavestenja')
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
        Schema::dropIfExists('obavestenja_recenzent');
    }
}
