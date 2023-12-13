<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisenoPoliticoRegionalesTable extends Migration
{
    public function up()
    {
        Schema::create('diseno_politico_regionales', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('bajada');
            $table->string('titulo_seccion_form');
            $table->string('titulo_seccion_encue');
            $table->text('bajada_seccion_encue');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diseno_politico_regionales');
    }
}

