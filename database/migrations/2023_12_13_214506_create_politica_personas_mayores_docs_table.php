<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliticaPersonasMayoresDocsTable extends Migration
{
    public function up()
    {
        Schema::create('politica_personas_mayores_docs', function (Blueprint $table) {
            $table->id();
            $table->string('nombredocs')->nullable();
            $table->string('urldocs');
            $table->unsignedBigInteger('politica_personas_mayores_id');
            $table->foreign('politica_personas_mayores_id')->references('id')->on('politica_personas_mayores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('politica_personas_mayores_docs');
    }
}