<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNombreToDocGestionPersonasTable extends Migration
{
    public function up()
    {
        Schema::table('doc_gestion_personas', function (Blueprint $table) {
            $table->string('nombre')->nullable();
        });
    }

    public function down()
    {
        Schema::table('doc_gestion_personas', function (Blueprint $table) {
            $table->dropColumn('nombre');
        });
    }
}
