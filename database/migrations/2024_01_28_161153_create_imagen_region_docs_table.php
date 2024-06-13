<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenRegionDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_region_docs', function (Blueprint $table) {
            $table->id();
            $table->string('nombredoc');
            $table->string('urldoc')->nullable();
            $table->unsignedBigInteger('imagenregion_id');
            $table->foreign('imagenregion_id')->references('id')->on('imagen_regions')->onDelete('cascade');
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
        Schema::dropIfExists('imagen_region_docs');
    }
}
