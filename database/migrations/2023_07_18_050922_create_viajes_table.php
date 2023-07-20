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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('carrera');
            $table->string('matricula');
            $table->string('conductor');
            $table->string('matricula_Auto');
            $table->string('origen');
            $table->string('destino');
            $table->string('fecha');
            $table->string('asientos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
