<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesDigitalesDocsTable extends Migration
{
    public function up()
    {
        Schema::create('tramites_digitales_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tramite_id')->constrained('tramites_digitales');
            $table->string('nombre_documento');
            $table->string('nombre_comprimido')->nullable();
            $table->string('ruta_documento')->nullable();
            $table->string('ruta_comprimido')->nullable();
            // Otros campos necesarios
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tramites_digitales_docs');
    }
}
