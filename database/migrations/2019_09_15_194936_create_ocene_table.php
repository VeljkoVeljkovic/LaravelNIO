<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOceneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocene', function (Blueprint $table) {
            $table->bigIncrements('idOcene');
            $table->integer('ocenaProjekta');
            $table->string('komentarOcene');
            $table->string('statusOcene');
            $table->unsignedBigInteger('pitanjaPoziv_idPitanja');
            $table->foreign('pitanjaPoziv_idPitanja')
                ->references('idPitanja')->on('pitanja_pozivi')
                ->onDelete('cascade');
            $table->unsignedBigInteger('projekatRecenzent_id');
            $table->foreign('projekatRecenzent_id')
                ->references('id')->on('projekat_recenzent')
                ->onDelete('cascade');
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
        Schema::dropIfExists('ocenes');
    }
}
