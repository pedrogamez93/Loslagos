<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarSuperficieNuevaAEstadisticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Estadisticas', function (Blueprint $table) {
            $table->decimal('superficie_nueva', 10, 2)->after('superficie')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Estadisticas', function (Blueprint $table) {
            //
        });
    }
}
