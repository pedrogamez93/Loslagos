<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeygbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leygbs', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_norma');
            $table->date('fecha_publicacion');
            $table->date('fecha_promulgacion');
            $table->string('organismo');
            $table->string('titulo');
            $table->string('tipo_version');
            $table->date('inicio_vigencia');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('leygbs');
    }
}
