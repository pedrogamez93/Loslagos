<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapaSitiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapa_sitios', function (Blueprint $table) {
            $table->id();
            $table->text('urlPadre'); // Primer campo de texto
            $table->text('nombreUrl'); // Segundo campo de texto
            $table->text('url'); // Tercer campo de texto
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
        Schema::dropIfExists('mapa_sitios');
    }
}
