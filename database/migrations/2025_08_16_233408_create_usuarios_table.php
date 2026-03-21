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
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->string('correo', 100)->unique();
        $table->string('documento')->unique();
        $table->enum('tipo_usuario', ['estudiante', 'docente', 'externo']);
        $table->foreignId('documento_id')->nullable()->constrained();
        $table->foreignId('especialidad_id')->nullable()->constrained('especialidades');
        $table->foreignId('carrera_id')->nullable()->constrained('carreras');
        $table->foreignId('rol_id')->constrained('roles');

        $table->timestamps();
        $table->softDeletes();
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
