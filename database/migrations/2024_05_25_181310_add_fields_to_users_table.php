<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('rut')->unique()->nullable();
            $table->enum('rol', ['admin', 'gestor', 'editor'])->default('editor');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'apellido', 'rut', 'rol']);
        });
    }
}
