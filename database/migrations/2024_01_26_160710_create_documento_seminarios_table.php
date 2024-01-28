<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoSeminariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_seminarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminario_id')->constrained('seminarios')->onDelete('cascade');
            $table->string('nombre_doc')->nullable();
            $table->string('url_doc')->nullable();
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
        Schema::dropIfExists('documento_seminarios');
    }
}
