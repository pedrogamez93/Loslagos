<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechadocToDocumentosSesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documentos_sesiones', function (Blueprint $table) {
            $table->datetime('fechadoc')->after('otro_campo')->nullable();
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
            $table->dropColumn('fechadoc');
        });
    }
}