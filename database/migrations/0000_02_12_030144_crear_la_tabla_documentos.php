<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    * Estas tablas se crean de forma masiva porque tienen la misma estructura
    */
    public $tablas = ['documentos', 'especialidades', 'carreras', 'roles', 'area_conocimiento'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Tablas: se recorre con un ciclo para evitar crear tantos archivos
        foreach ($this->tablas as $tabla) {
            Schema::create($tabla, function (Blueprint $table) {
                $table->id('id');
                $table->string('nombre');

                $table->timestamps();
                $table->softDeletes();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->tablas as $tabla) {
            Schema::dropIfExists('documentos');
        }

    }
};
