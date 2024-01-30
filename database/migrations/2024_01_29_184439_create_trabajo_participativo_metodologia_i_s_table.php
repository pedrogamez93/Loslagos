<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajoParticipativoMetodologiaISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_participativo_metodologia_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TrabajoParticipativoMetodologiaI_id');
            $table->foreign('TrabajoParticipativoMetodologiaI_id')->references('id')->on('trabajo_participativo_metodologias')->onDelete('cascade');
            $table->string('nombreA');
            $table->integer('archivo');
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
        Schema::dropIfExists('trabajo_participativo_metodologia_i_s');
    }
}
