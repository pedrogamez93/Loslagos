<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePoliticaPersonasMayoresDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('politica_personas_mayores_docs', function (Blueprint $table) {
            $table->string('nombredocs')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('politica_personas_mayores_docs', function (Blueprint $table) {
            $table->string('nombredocs')->change();
        });
    }
}
