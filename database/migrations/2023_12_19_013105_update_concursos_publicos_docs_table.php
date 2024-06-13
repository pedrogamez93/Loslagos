<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConcursosPublicosDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concursos_publicos_docs', function (Blueprint $table) {
            $table->text('nombre_documento')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concursos_publicos_docs', function (Blueprint $table) {
            $table->string('nombre_documento')->change();
        });
    }
}