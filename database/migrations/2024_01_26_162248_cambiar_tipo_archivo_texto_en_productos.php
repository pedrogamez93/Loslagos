<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CambiarTipoArchivoTextoEnProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productosdela_politicade_turismo_i_s', function (Blueprint $table) {
            $table->text('archivo')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productosdela_politicade_turismo_i_s', function (Blueprint $table) {
            $table->integer('archivo')->change();
        });
    }
}
