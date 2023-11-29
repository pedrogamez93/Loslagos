<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Autoridades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('lugar_fecha_nacimiento');
            $table->string('actividad_profesion');
            $table->string('partido_politico');
            $table->string('cargo');
            $table->string('institucion');
            $table->string('direccion');
            $table->string('fono');
            $table->string('fax');
            $table->string('Email');
            $table->string('region');
            $table->string('provincia');
            $table->string('comuna');
            $table->string('web');
            $table->string('foto')->nullable();
            $table->text('biografia');
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
        Schema::dropIfExists('Autoridades');
    }
}
