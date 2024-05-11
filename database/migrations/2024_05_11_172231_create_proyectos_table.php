<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('categoria', ['software', 'redes', 'hardware', 'sistema ERP', 'sistema TVP']); // Categories as enum
            $table->foreignId('lider_id')->constrained('usuarios'); // Assuming lider_id is a foreign key to usuarios table
            $table->timestamp('fecha')->useCurrent(); // Date field with default value as current timestamp
            $table->foreignId('cliente_id')->constrained('usuarios'); // Assuming cliente_id is also a foreign key to usuarios table
            $table->timestamps(); // Default created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
