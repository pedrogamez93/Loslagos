<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaprensaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaprensa', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');  
            $table->string('categoria');   
            $table->text('descripcion');
            $table->string('archivo_path');
            $table->date('fecha'); // Agregamos el campo fecha de tipo date
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
        Schema::dropIfExists('salaprensa');
    }
}
