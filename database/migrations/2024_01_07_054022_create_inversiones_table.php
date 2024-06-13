<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversiones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo1');
            $table->text('descripcionG');
            $table->string('imagenD2')->nullable();
            $table->string('titulo2');
            $table->text('descripcionG2');
            $table->string('titulo3');
            $table->text('descripcionG3');
            $table->string('imagenD3')->nullable();
            $table->string('titulo3acordeon1')->nullable();
            $table->text('acordeon1')->nullable();
            $table->string('titulo3acordeon2')->nullable();
            $table->text('acordeon2')->nullable();
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
        Schema::dropIfExists('inversiones');
    }
}
