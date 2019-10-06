<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnketaPitanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anketa_pitanja', function (Blueprint $table) {
            $table->bigIncrements('idPitanja');
            $table->string('pitanje');
            $table->string('odgovor1')->nullable();
            $table->string('odgovor2')->nullable();
            $table->string('odgovor3')->nullable();
            $table->string('odgovor4')->nullable();
            $table->unsignedBigInteger('anketa_idAnketa');
            $table->foreign('anketa_idAnketa')
      ->references('idAnketa')->on('anketa')
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
        Schema::dropIfExists('anketa_pitanja');
    }
}
