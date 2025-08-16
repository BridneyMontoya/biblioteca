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
    Schema::create('atenciones', function (Blueprint $table) {
        $table->id('id');
        $table->foreignId('usuario_id')->constrained('usuarios');
        $table->foreignId('libro_id')->constrained('libros');
        $table->enum('tipo_atencion', ['consulta', 'prestamo']);
        $table->dateTime('fecha_atencion');
        $table->dateTime('fecha_devol')->nullable();
        $table->enum('estado', ['activa', 'finalizada']);
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencions');
    }
};
