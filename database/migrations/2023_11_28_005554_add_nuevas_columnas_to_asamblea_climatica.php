<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNuevasColumnasToAsambleaClimatica extends Migration
{
    public function up()
    {
        Schema::table('asamblea_climaticas', function (Blueprint $table) {
            $table->string('titulo_seccion_btn')->nullable();
            $table->string('nombre_btn')->nullable();
            $table->string('url_btn')->nullable();
        });
    }

    public function down()
    {
        Schema::table('asamblea_climaticas', function (Blueprint $table) {
            $table->dropColumn('titulo_seccion_btn');
            $table->dropColumn('nombre_btn');
            $table->dropColumn('url_btn');
        });
    }
}