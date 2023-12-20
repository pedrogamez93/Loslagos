<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromTramitesDigitalesDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramites_digitales_docs', function (Blueprint $table) {
            $table->dropColumn('nombre_comprimido');
            $table->dropColumn('ruta_comprimido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramites_digitales_docs', function (Blueprint $table) {
            //
        });
    }
}
