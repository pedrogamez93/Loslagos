<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionPublicaEfectivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InversionPublicaEfectiva', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('periodo');
            $table->string('fuente');
            $table->string('descripcion');
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
        Schema::dropIfExists('InversionPublicaEfectiva');
    }
}
