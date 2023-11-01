<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToIntroduccions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('introduccion', function (Blueprint $table) {
            $table->string('tag_comentario_comof')->nullable();
            $table->string('titulocomof')->nullable();
            $table->text('bajadacomof')->nullable();
            $table->string('imgcomof')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('introduccion', function (Blueprint $table) {
            //
        });
    }
}
