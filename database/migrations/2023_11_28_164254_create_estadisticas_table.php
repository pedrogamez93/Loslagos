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
            $table->string('superficie');
            $table->string('comuna');
            $table->string('p_urbana_hombre');
            $table->string('p_urbana_mujeres');
            $table->string('p_rural_hombre');
            $table->string('p_rural_mujeres');
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
