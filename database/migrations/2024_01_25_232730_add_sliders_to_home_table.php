<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlidersToHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home', function (Blueprint $table) {
        

            $table->string('slider1')->nullable();
            $table->string('slider2')->nullable();
            $table->string('slider3')->nullable();
            $table->string('slider4')->nullable();
            $table->string('slider5')->nullable();
           


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home', function (Blueprint $table) {
            $table->dropColumn('slider1');
            $table->dropColumn('slider2');
            $table->dropColumn('slider3');
            $table->dropColumn('slider4');
            $table->dropColumn('slider5');
        });
    }
}
