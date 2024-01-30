<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcomisionesISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcomisiones_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SubcomisionesI_id');
            $table->foreign('SubcomisionesI_id')->references('id')->on('subcomisiones')->onDelete('cascade');
            $table->text('nombreA');
            $table->text('archivo');
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
        Schema::dropIfExists('subcomisiones_i_s');
    }
}
