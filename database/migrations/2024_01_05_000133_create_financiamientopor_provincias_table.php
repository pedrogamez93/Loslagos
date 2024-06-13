<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanciamientoporProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FinanciamientoporProvincias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('periodo');
            $table->integer('provinciaInversionLD');
            $table->decimal('provinciaInversionLP', 8, 2);
            $table->integer('provinciaInversionCD');
            $table->decimal('provinciaInversionCP', 8, 2);
            $table->integer('provinciaInversionOD');
            $table->decimal('provinciaInversionOP', 8, 2);
            $table->integer('provinciaInversionPD');
            $table->decimal('provinciaInversionPP', 8, 2);
            $table->integer('provinciaInversionRD');
            $table->decimal('provinciaInversionRP', 8, 2);
            $table->string('fuente');
            $table->text('descripcion');

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
        Schema::dropIfExists('FinanciamientoporProvincias');
    }
}
