<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnImagenFromProgramasFotografias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programas_fotografias', function (Blueprint $table) {
            $table->dropColumn('imagen');
            $table->foreignId('coleccion_id')->constrained('programas_colecciones');
            $table->renameColumn('titulo', 'ruta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programas_fotografias', function (Blueprint $table) {
            //
        });
    }
}
