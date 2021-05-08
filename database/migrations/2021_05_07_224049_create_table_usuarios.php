<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
        /**
             * Datos de usuario requeridos:
             * 
             * Nombre
             * Apellido
             * Número de identificación
             * Correo
             * Celular
             * Contraseña (password) Esta es añadida para realizar el login
            */

            $table->id('id_usuario')->autoIncrement(10000); 
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->string('num_identificacion',10)->unique();
            $table->string('e_mail',50)->unique();
            $table->string('celular',11);
            $table->string('password',12);

            /**
             * Datos adicionales para realizar validaciones y seguridad:
             * 
             * Hora de creación de usuario y actualizacion
             * Hora de inicio de sesion
             * Token de sesion abierta
            
             */

            $table->timestamps();
            $table->timestamp('hora_ultimo_login')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
