<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarCamposAExportacionSegunBloqueEconomico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ExportacionSegunBloqueEconomico', function (Blueprint $table) {
            // Agrega esta verificación para cada nueva columna
            if (!Schema::hasColumn('ExportacionSegunBloqueEconomico', 'actividad6')) {
                $table->string('actividad6');
            }
            if (!Schema::hasColumn('ExportacionSegunBloqueEconomico', 'valoractividad6')) {
                $table->string('valoractividad6');
            }
            // Repite para otras columnas si es necesario
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ExportacionSegunBloqueEconomico', function (Blueprint $table) {
            //
        });
    }
}
