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
    Schema::create('libros', function (Blueprint $table) {
        $table->id('id');
        $table->string('titulo', 255);
        $table->string('autor', 255);
        $table->string('editorial', 100);
        $table->year('anio');
        $table->string('isbn', 20);
        $table->foreignId('area_conocimiento_id')->constrained('area_conocimiento');
        $table->integer('stock_total');
        $table->integer('stock_disponible');

        $table->timestamps();
        $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
