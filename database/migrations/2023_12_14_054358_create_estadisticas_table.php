<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Estadisticas', function (Blueprint $table) {
            $table->id();
            $table->string('provincia');
            $table->integer('superficie');
            $table->string('comuna');
            $table->integer('p_urbana_hombre');
            $table->integer('p_urbana_mujeres');
            $table->integer('p_rural_hombre');
            $table->integer('p_rural_mujeres');
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
        Schema::dropIfExists('Estadisticas');
    }
}
