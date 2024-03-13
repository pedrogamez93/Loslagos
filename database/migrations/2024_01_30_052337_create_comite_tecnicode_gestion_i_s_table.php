<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComiteTecnicodeGestionISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comite_tecnicode_gestion_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ComiteTecnicodeGestionI_id');
            $table->foreign('ComiteTecnicodeGestionI_id')->references('id')->on('comite_tecnicode_gestions')->onDelete('cascade');
            $table->text('nombreA');
            $table->text('archivo');
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
        Schema::dropIfExists('comite_tecnicode_gestion_i_s');
    }
}
