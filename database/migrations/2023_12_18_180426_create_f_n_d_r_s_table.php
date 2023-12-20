<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFNDRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FNDR', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('actividad1');
            $table->string('valoractividad1'); 
            $table->string('actividad2');
            $table->string('valoractividad2'); 
            $table->string('actividad3');
            $table->string('valoractividad3'); 
            $table->string('actividad4');
            $table->string('valoractividad4'); 
            $table->string('actividad5');
            $table->string('valoractividad5'); 
            $table->string('total'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FNDR');
    }
}
