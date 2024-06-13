<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsejoRegionalsTable extends Migration
{
    public function up()
    {
        Schema::create('consejo_regionals', function (Blueprint $table) {
            $table->id();
            $table->string('tag_comentario')->nullable();
            $table->string('titulo');
            $table->text('bajada')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consejo_regionals');
    }
}