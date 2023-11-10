<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesDigitalesTable extends Migration
{
    public function up()
    {
        Schema::create('tramites_digitales', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('tags')->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha_apertura');
            $table->date('fecha_cierre')->nullable();
            $table->string('icono')->nullable();
            $table->text('url')->nullable();
            $table->text('url_single')->nullable();
            // Otros campos necesarios
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tramites_digitales');
    }
}
