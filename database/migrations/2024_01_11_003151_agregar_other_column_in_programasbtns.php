<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarOtherColumnInProgramasbtns extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
    public function up()
    {
        Schema::table('programasbtns', function (Blueprint $table) {
            $table->unsignedBigInteger('programa_id');

            // Agregar la restricción de clave foránea
            $table->foreign('programa_id')
                ->references('id')
                ->on('programas')
                ->onDelete('cascade'); // Esto indica que si el programa asociado se elimina, también se eliminarán los registros relacionados en programasbtns
        });
    }
    */
    public function up()
{
    Schema::table('programasbtns', function (Blueprint $table) {
        // Agrega esta verificación para cada nueva columna
        if (!Schema::hasColumn('ExportacionSegunBloqueEconomico', 'actividad6')) {
            $table->unsignedBigInteger('programa_id');

            // Agregar la restricción de clave foránea
            $table->foreign('programa_id')
                ->references('id')
                ->on('programas')
                ->onDelete('cascade'); // Esto indica que si el programa asociado se elimina, también se eliminarán los registros relacionados en programasbtns            
        }

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programasbtns', function (Blueprint $table) {
            $table->dropForeign(['programa_id']);
            $table->dropColumn('programa_id');
        });
    }
}