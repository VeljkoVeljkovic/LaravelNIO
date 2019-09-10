<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjekatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekat', function (Blueprint $table) {
            $table->bigIncrements('idProjekat');
            $table->string('nazivProjekta');
            $table->string('rukovodiocProjekta');
            $table->string('NIOrukovodioc');
            $table->string('zvanjeRukovodioca');
            $table->string('angazovanjeRukovodioca');
            $table->string('oblastProjekta');
            $table->dateTime('datumPodnosenja');
            $table->string('odlukaProjekta');
            $table->unsignedBigInteger('pozivi_idPoziv');
            $table->foreign('pozivi_idPoziv')
      ->references('idPoziv')->on('pozivi')
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
        Schema::dropIfExists('projekat');
    }
}
