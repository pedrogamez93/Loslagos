<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudienciasPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencias_partes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->text('bajada')->nullable();
            $table->string('titulo_secciontwo')->nullable();
            // Otros campos que puedas necesitar
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
        Schema::dropIfExists('audiencias_partes');
    }
}
