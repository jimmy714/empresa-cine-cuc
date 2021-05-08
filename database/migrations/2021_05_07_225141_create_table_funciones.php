<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFunciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->id('id_funcion');
            $table->unsignedInteger('id_pelicula');
            $table->foreign('id_pelicula')->references('id_pelicula')->on('peliculas');
            $table->dateTime('hora_incio');
            $table->dateTime('hora_fin');
            $table->unsignedInteger('id_lugar');
            $table->foreign('id_lugar')->references('id_lugar')->on('lugares');
            $table->unsignedInteger('cupo');


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
        Schema::dropIfExists('funciones');
    }
}
