<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarCampoVideoEnLanzamientoPoliticaTurismo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lanzamiento_politica_turismos', function (Blueprint $table) {
            $table->dropColumn('video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lanzamiento_politica_turismos', function (Blueprint $table) {
            $table->string('video')->nullable(); // Revertir el cambio si es necesario
        });
    }
}
