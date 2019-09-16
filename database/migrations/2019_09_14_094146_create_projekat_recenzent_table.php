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
            $table->unsignedBigInteger('projekat_idProjekat');
            $table->foreign('projekat_idProjekat')
                ->references('idProjekat')->on('projekat')
                ->onDelete('cascade');
            $table->unsignedBigInteger('recenzent_idRecenzent');
            $table->foreign('recenzent_idRecenzent')
                ->references('idRecenzent')->on('recenzent')
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
        Schema::dropIfExists('projekat_recenzent');
    }
}
