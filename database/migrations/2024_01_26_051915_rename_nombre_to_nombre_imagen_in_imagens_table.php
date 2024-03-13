<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNombreToNombreImagenInImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagens', function (Blueprint $table) {
            $table->renameColumn('nombre', 'nombre_imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagens', function (Blueprint $table) {
            $table->renameColumn('nombre_imagen', 'nombre');
        });
    }
}