<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudienciasPartesDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencias_partes_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audiencias_parte_id')->constrained(); // Clave foránea
            $table->string('nombre_doc')->nullable();
            $table->string('url_doc')->nullable();
            // Otros campos que puedas necesitar
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
        Schema::dropIfExists('audiencias_partes_docs');
    }
}
