<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnsNullableInFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->string('nombre')->nullable()->change();
            $table->string('apellido')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('sexo')->nullable()->change();
            $table->string('direccion')->nullable()->change();
            $table->string('provincia')->nullable()->change();
            $table->string('comuna')->nullable()->change();
            $table->string('telefono')->nullable()->change();
            $table->string('tipo_mensaje')->nullable()->change();
            $table->string('mensaje')->nullable()->change();
            $table->string('date')->nullable()->change();
            $table->string('usted_escribe_como')->nullable()->change();
            $table->string('actividad_oficio')->nullable()->change();
            $table->string('intitucion_a_enviar')->nullable()->change();
            $table->string('tema_mensaje')->nullable()->change();
            $table->string('proposito_objetivo')->nullable()->change();
            $table->string('solicita_respuestas')->nullable()->change();
            $table->string('mensaje_sugerencia_reclamo')->nullable()->change();
            // Repite este proceso para las demás columnas que desees hacer nullable
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formularios', function (Blueprint $table) {
            //
        });
    }
}
