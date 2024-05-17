<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosdelaPoliticadeTurismoISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productosdela_politicade_turismo_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('nombre');
            $table->text('url');
            $table->unsignedBigInteger('ProductosdelaPoliticadeTurismoI_id');
            $table->foreign('ProductosdelaPoliticadeTurismoI_id')->references('id')->on('productosdela_politicade_turismos')->onDelete('cascade');
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
        Schema::dropIfExists('productosdela_politicade_turismo_i_s');
    }
}
