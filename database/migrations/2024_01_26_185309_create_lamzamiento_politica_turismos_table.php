<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamzamientoPoliticaTurismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lanzamiento_politica_turismos', function (Blueprint $table) {
            $table->id();
            $table->text('titulo')->nullable();
            $table->text('nombre')->nullable();
            $table->text('video')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('nombreA')->nullable();
            $table->text('archivo')->nullable();
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
        Schema::dropIfExists('lanzamiento_politica_turismos');
    }
}
