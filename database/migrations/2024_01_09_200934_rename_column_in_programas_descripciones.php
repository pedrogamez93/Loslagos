<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInProgramasDescripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programas_descripciones', function (Blueprint $table) {
            $table->renameColumn('titulo', 'titulo_descripcion');
            $table->renameColumn('bajada', 'bajada_descripcion');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programas_descripciones', function (Blueprint $table) {
            //
        });
    }
}
