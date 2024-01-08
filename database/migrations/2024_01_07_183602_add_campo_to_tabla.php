<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampoToTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programas', function (Blueprint $table) {
            $table->text('bajada_programa')->default('')->nullable(false);
        });
    }

    public function down()
    {
        Schema::table('nombre_de_la_tabla', function (Blueprint $table) {
            $table->dropColumn('bajada_programa');
        });
    }
}
