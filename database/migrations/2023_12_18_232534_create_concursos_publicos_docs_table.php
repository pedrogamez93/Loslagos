<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcursosPublicosDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos_publicos_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concursos_publicos_id')->constrained('concursos_publicos');
            $table->string('nombre_documento');
            $table->string('ruta_documento');
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
        Schema::dropIfExists('concursos_publicos_docs');
    }
}
