<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliticaPersonasMayoresTable extends Migration
{
    public function up()
    {
        Schema::create('politica_personas_mayores', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('bajada');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('politica_personas_mayores');
    }
}
