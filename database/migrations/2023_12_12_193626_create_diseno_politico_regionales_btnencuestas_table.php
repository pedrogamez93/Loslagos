<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisenoPoliticoRegionalesBtnencuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseno_politico_regionales_btnencuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diseno_politico_regionales_id');
            $table->foreign('diseno_politico_regionales_id')->references('id')->on('diseno_politico_regionales')->onDelete('cascade');
            $table->string('nombre_encuesta');
            $table->string('nombre_btn_encuesta');
            $table->string('url_btn_encuesta');

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
        Schema::dropIfExists('diseno_politico_regionales_btnencuestas');
    }
}
