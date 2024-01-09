<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('titulobanner')->nullable();
            $table->string('descripcionbanner')->nullable();
            $table->string('minibanners1')->nullable();
            $table->string('url_minibanner1')->nullable();
            $table->string('minibanners2')->nullable();
            $table->string('url_minibanner2')->nullable();
            $table->string('minibanners3')->nullable();
             $table->string('url_minibanner3')->nullable();
            $table->string('minibanners4')->nullable();
             $table->string('url_minibanner4')->nullable();
            $table->string('minibanners5')->nullable();
             $table->string('url_minibanner5')->nullable();
            $table->string('minibanners6')->nullable();
             $table->string('url_minibanner6')->nullable();
            $table->string('minibanners7')->nullable();
             $table->string('url_minibanner7')->nullable();
            $table->string('minibanners8')->nullable();
             $table->string('url_minibanner8')->nullable();
            $table->string('minibanners9')->nullable();
             $table->string('url_minibanner9')->nullable();
            $table->string('minibanners10')->nullable();
             $table->string('url_minibanner10')->nullable();
            $table->string('minibanners11')->nullable();
             $table->string('url_minibanner11')->nullable();
            $table->string('minibanners12')->nullable();
             $table->string('url_minibanner12')->nullable();
            
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
        Schema::dropIfExists('home');
    }
}
