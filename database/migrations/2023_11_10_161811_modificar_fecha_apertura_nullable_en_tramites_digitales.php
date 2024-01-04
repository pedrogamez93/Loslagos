<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificarFechaAperturaNullableEnTramitesDigitales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramites_digitales', function (Blueprint $table) {
            $table->date('fecha_apertura')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramites_digitales', function (Blueprint $table) {
            $table->date('fecha_apertura')->change();
        });
    }
}
