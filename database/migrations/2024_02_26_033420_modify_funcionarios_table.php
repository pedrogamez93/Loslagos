<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->string('nombre')->nullable()->change();
            $table->string('division')->nullable()->change();
            $table->string('departamento')->nullable()->change();
            $table->string('cargo')->nullable()->change();
            $table->string('direccion')->nullable()->change();
            $table->string('telefono')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('region')->nullable()->change();
            $table->string('provincia')->nullable()->change();
            $table->string('comuna')->nullable()->change();
            $table->string('foto')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No necesitas hacer nada en el método down
    }
}
