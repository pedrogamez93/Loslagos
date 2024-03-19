<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsSeccionesFndrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_secciones_fndrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_fndr_id')->constrained('secciones_fndrs')->onDelete('cascade');
            $table->string('titulo_documento')->nullable();
            $table->string('ruta_documento')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs_secciones_fndrs');
    }
}
