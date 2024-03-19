<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionesFndrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones_fndrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fondo_fndr_id')->constrained('fondos_fndrs')->onDelete('cascade');
            $table->string('titulo_seccion')->nullable();

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
        Schema::dropIfExists('secciones_fndrs');
    }
}
