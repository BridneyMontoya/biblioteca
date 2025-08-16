<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id('id');
        $table->string('nombre', 100);
        $table->string('apellido', 100);
        $table->string('correo', 100)->unique();
        $table->enum('tipo_usuario', ['estudiante', 'docente', 'externo']);
        $table->string('carrera', 100)->nullable();
        $table->string('especialidad', 100)->nullable();
        $table->string('documento_id', 20);
        $table->string('contraseña');
        $table->integer('id_rol')->constrained('roles');
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
