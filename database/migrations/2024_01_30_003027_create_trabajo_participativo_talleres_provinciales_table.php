<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajoParticipativoTalleresProvincialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_participativo_talleres_provinciales', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->text('nombre');
            $table->text('descripcion');
            $table->text('tituloA');
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
        Schema::dropIfExists('trabajo_participativo_talleres_provinciales');
    }
}
