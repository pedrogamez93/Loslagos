<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesDigitalesBtnsTable extends Migration
{
    public function up()
    {
        Schema::create('tramites_digitales_btns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_id');
            $table->string('nombre_btn');
            $table->string('url');
            $table->timestamps();

            $table->foreign('tramite_id')->references('id')->on('tramites_digitales')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tramites_digitales_btns');
    }
}
