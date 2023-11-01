<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromIntroduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('introduccion', function (Blueprint $table) {
            $table->dropColumn(['tag_comentario_comof', 'titulocomof', 'bajadacomof', 'imgcomof']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('introduccions', function (Blueprint $table) {
            //
        });
    }
}
