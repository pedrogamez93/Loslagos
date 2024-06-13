<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesaPublicoPrivadaISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_publico_privada_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MesaPublicoPrivadaI_id');
            $table->foreign('MesaPublicoPrivadaI_id')->references('id')->on('mesa_publico_privadas')->onDelete('cascade');
            $table->text('nombreA');
            $table->text('archivo');
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
        Schema::dropIfExists('mesa_publico_privada_i_s');
    }
}
