<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->text('tags')->nullable();
            $table->string('titulo'); // Este campo es obligatorio
            $table->text('descripcion')->nullable();
            $table->string('img')->nullable();
            $table->string('menu_ubicacion')->nullable();
            $table->boolean('habilitado')->default(true); // Predeterminadamente habilitado
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
        Schema::dropIfExists('landings');
    }
}
