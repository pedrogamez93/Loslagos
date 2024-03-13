<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDifusionDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difusion_docs', function (Blueprint $table) {
            $table->id();
            $table->string('nombredoc');
            $table->string('urldoc')->nullable();
            $table->unsignedBigInteger('difusion_id');
            $table->foreign('difusion_id')->references('id')->on('difusions')->onDelete('cascade');
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
        Schema::dropIfExists('difusion_docs');
    }
}
