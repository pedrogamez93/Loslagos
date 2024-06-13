<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeBajadaNullableInPoliticaPersonasMayoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('politica_personas_mayores', function (Blueprint $table) {
            $table->text('bajada')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('politica_personas_mayores', function (Blueprint $table) {
            $table->text('bajada')->nullable(false)->change();
        });
    }
}