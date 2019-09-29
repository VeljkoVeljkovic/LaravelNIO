<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjekatRecenzentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekat_recenzent', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->unsignedBigInteger('p_idProjekat');
            $table->foreign('p_idProjekat')
                ->references('idProjekat')->on('projekat')
                ->onDelete('cascade');
            $table->unsignedBigInteger('r_idRecenzent');
            $table->foreign('r_idRecenzent')
                ->references('idRecenzent')->on('recenzent')
                ->onDelete('cascade');
            $table->unique(['p_idProjekat', 'r_idRecenzent']);
            $table->date('datumPodnosenja');
            $table->string('stanjePrijave');
            $table->date('datumDodele');
            $table->date('rokZaIzvestaj');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projekat_recenzent');
    }
}
