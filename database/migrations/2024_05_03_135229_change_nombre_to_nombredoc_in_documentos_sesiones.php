<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNombreToNombredocInDocumentosSesiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documentos_sesiones', function (Blueprint $table) {
            $table->renameColumn('nombre', 'nombredoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos_sesiones', function (Blueprint $table) {
            $table->renameColumn('nombredoc', 'nombre');
        });
    }
}