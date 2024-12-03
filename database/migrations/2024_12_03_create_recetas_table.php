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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mascota'); // Relación con la tabla mascotas
            $table->string('diagnostico');
            $table->string('tratamiento');
            $table->string('medicamentos');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
