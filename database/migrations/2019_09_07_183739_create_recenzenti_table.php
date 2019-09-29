<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecenzentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recenzenti', function (Blueprint $table) {
            $table->bigIncrements('idRecenzent');
            $table->string('ime');
            $table->string('prezime');
            $table->string('nacionalnost');
            $table->string('zemlja');
            $table->string('NIO');
            $table->string('trenutnaFirma');
            $table->string('naucnoZvanje');
            $table->string('angazovanje');
            $table->string('telefon');
            $table->string('adresa');
            $table->string('vebStranica');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('oblastStrucnosti_id');
            $table->foreign('oblastStrucnosti_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('rola');
            $table->string('stanjePrijave');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recenzenti');
    }
}
