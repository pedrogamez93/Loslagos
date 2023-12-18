<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComiteCienciasDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comite_ciencias_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comite_ciencias_id')->constrained('comite_ciencias');
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
        Schema::dropIfExists('comite_ciencias_docs');
    }
}
