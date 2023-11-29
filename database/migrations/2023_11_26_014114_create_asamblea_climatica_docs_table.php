<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsambleaClimaticaDocsTable extends Migration
{
    public function up()
    {
        Schema::create('asamblea_climatica_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asamblea_climaticas_id')->constrained('asamblea_climaticas');
            $table->string('nombre_documento');
            $table->string('ruta_documento');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asamblea_climatica_docs');
    }
}