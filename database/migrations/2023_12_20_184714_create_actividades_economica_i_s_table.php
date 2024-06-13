<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesEconomicaISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ActividadesEconomicaI', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ActividadesEconomicaI_id');
            $table->foreign('ActividadesEconomicaI_id')->references('id')->on('ActividadEconomica')->onDelete('cascade');
            $table->string('nombreA');
            $table->integer('hombres');
            $table->integer('mujeres');
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
        Schema::dropIfExists('ActividadesEconomicaI');
    }
}
