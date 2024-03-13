<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajoParticipativoTalleresProvincialesISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_participativo_talleres_provinciales_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TrabajoParticipativoTalleresProvincialesI_id');
            $table->foreign('TrabajoParticipativoTalleresProvincialesI_id')->references('id')->on('trabajo_participativo_talleres_provinciales')->onDelete('cascade');
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
        Schema::dropIfExists('trabajo_participativo_talleres_provinciales_i_s');
    }
}
