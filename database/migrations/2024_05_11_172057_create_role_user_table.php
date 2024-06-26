<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id'); // Asegúrate de que el nombre de la columna es correcto
            $table->unsignedBigInteger('role_id');

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->primary(['usuario_id', 'role_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
