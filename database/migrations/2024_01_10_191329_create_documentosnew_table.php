<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosnewTable extends Migration
{
    public function up()
    {
        Schema::create('documentosnew', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('provincia')->nullable();
            $table->string('comuna')->nullable();
            $table->text('tema')->nullable();
            $table->dateTime('fecha_hora')->nullable();
            $table->text('lugar')->nullable();
            $table->bigInteger('numero_sesion')->nullable();
            $table->dateTime('fecha_hora_sesion')->nullable();
            $table->enum('portada', ['si', 'no'])->nullable();
            $table->enum('publicacion', ['si', 'no'])->nullable();
            $table->text('archivo')->nullable();
            $table->timestamps();
        });

        Schema::create('actas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documentonew_id')->constrained('documentosnew')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('acuerdos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documentonew_id')->constrained('documentosnew')->onDelete('cascade');
            $table->bigInteger('numero')->nullable();
            $table->date('fecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('codigo_bip')->nullable();
            $table->timestamps();
        });

        Schema::create('resumen_gastos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documentonew_id')->constrained('documentosnew')->onDelete('cascade');
            $table->text('nombre')->nullable();
            $table->enum('portada', ['si', 'no'])->nullable();
            $table->enum('publicacion', ['si', 'no'])->nullable();
            $table->timestamps();
        });

        Schema::create('documentos_generales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('documentonew_id')->constrained('documentosnew')->onDelete('cascade');
            $table->string('categoria')->nullable();
            $table->text('titulo')->nullable();
            $table->text('autor')->nullable();
            $table->string('sector')->nullable();
            $table->string('sub_sector')->nullable();
            $table->text('financiamiento')->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('portada', ['si', 'no'])->nullable();
            $table->enum('publicacion', ['si', 'no'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentosnew');
        Schema::dropIfExists('actas');
        Schema::dropIfExists('acuerdos');
        Schema::dropIfExists('resumen_gastos');
        Schema::dropIfExists('documentos_generales');
    }
}
