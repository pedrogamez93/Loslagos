<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnImagenFromProgramasColecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programas_colecciones', function (Blueprint $table) {
            $table->dropColumn('imagen');
            $table->foreignId('programa_id')->constrained('programas');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programas_colecciones', function (Blueprint $table) {
            //
        });
    }
}