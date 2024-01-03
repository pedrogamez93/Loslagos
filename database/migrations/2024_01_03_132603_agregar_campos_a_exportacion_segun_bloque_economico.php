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
            $table->string('actividad6');
            $table->string('valoractividad6'); 
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
