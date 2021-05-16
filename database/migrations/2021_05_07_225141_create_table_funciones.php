<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');
            $table->unsignedInteger('id_lugar');
            $table->foreign('id_lugar')->references('id_lugar')->on('lugares');
            $table->unsignedInteger('cupo');


            $table->timestamps();
        });

        //Dado que Postgree no soporta Unsigned Integers 
        DB::insert(
            'ALTER TABLE funciones 
            ADD CONSTRAINT cupo
            CHECK (cupo>=0);'
        );
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
