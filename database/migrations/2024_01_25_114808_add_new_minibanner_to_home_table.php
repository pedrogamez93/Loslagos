<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewMinibannerToHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home', function (Blueprint $table) {
            $table->string('minibanners13')->nullable();
            $table->string('url_minibanner13')->nullable();
            $table->string('minibanners14')->nullable();
            $table->string('url_minibanner14')->nullable();
            $table->string('minibanners15')->nullable();
             $table->string('url_minibanner15')->nullable();
            $table->string('minibanners16')->nullable();
             $table->string('url_minibanner16')->nullable();
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
           
            $table->dropColumn('minibanners13');
            $table->dropColumn('url_minibanner13');
            $table->dropColumn('minibanners14');
            $table->dropColumn('url_minibanner14');
            $table->dropColumn('minibanners15');
             $table->dropColumn('url_minibanner15');
            $table->dropColumn('minibanners16');
             $table->dropColumn('url_minibanner16');
        });
    }
}
