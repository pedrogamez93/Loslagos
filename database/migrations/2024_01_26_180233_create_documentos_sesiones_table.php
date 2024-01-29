<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosSesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_sesiones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sesion_id');
            $table->string('nombre');
            $table->string('url');
            $table->timestamps();
        
            $table->foreign('sesion_id')->references('id')->on('sesiones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_sesiones');
    }
}
