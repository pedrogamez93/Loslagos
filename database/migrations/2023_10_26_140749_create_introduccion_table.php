<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroduccionTable extends Migration
{
    public function up()
    {
        Schema::create('introduccion', function (Blueprint $table) {
            $table->id();
            $table->string('tag_comentario');
            $table->string('titulo');
            $table->text('bajada');
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('introduccion');
    }
}