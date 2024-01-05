<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsejerosPalenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consejeros_palenas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('profesion');
            $table->string('partidopolitico');
            $table->string('cargo');
            $table->string('actividad');
            $table->string('institucion');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('region');
            $table->string('provincia');
            $table->string('comuna');
            $table->string('periodosenconcejo');
            $table->string('comisiones');
            $table->string('imagen');
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
        Schema::dropIfExists('consejeros_palenas');
    }
}
