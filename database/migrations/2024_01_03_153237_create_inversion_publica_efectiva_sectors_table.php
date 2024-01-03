<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionPublicaEfectivaSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InversionPublicaEfectivaSector', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('InversionPublicaEfectiva_id');
            $table->foreign('InversionPublicaEfectiva_id')->references('id')->on('InversionPublicaEfectiva')->onDelete('cascade');
            $table->string('sector');
            $table->integer('inversionD');
            $table->integer('inversionP');
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
        Schema::dropIfExists('InversionPublicaEfectivaSector');
    }
}
