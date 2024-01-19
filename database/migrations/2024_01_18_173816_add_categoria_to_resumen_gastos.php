<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaToResumenGastos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('resumen_gastos', function (Blueprint $table) {
        $table->string('categoria')->nullable(); // Nuevo campo
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resumen_gastos', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
}
