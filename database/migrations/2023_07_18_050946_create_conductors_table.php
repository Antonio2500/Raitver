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
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('carrera');
            $table->string('Credencial');
            $table->string('Matricula');
            $table->string('Licencia');
            $table->string('Modelo_Auto');
            $table->string('Placas');
            $table->string('Asientos_Disponibles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductors');
    }
};
