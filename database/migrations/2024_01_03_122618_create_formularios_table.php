<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('sexo');
            $table->string('direccion'); 
            $table->string('provincia'); 
            $table->string('comuna'); 
            $table->string('telefono');
            $table->string('tipo_mensaje');
            $table->string('mensaje');
            $table->string('date');
            $table->string('usted_escribe_como');
            $table->string('actividad_oficio');
            $table->string('intitucion_a_enviar');
            $table->string('tema_mensaje');
            $table->string('proposito_objetivo');
            $table->string('solicita_respuestas');
            $table->string('mensaje_sugerencia_reclamo');
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
        Schema::dropIfExists('formularios');
    }
}
