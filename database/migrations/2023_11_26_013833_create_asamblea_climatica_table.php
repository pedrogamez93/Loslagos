<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsambleaClimaticaTable extends Migration
{
    public function up()
    {
        Schema::create('asamblea_climaticas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_one');
            $table->text('descripcion_one');
            $table->string('titulo_two');
            $table->text('descripcion_two');
            $table->string('titulo_tree');
            $table->text('descripcion_tree');
            $table->string('titulo_four');
            $table->text('descripcion_four');
            $table->string('titulo_five');
            $table->text('descripcion_five');
            $table->string('titulo_six');
            $table->text('descripcion_six');
            $table->string('titulo_seccion_two');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asamblea_climaticas');
    }
}
