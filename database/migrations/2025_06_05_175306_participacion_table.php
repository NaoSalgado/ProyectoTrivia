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
        Schema::create('participacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUsuario')->constrained('usuarios')->onDelete('cascade');
            $table->integer('puntajeObtenido');
            $table->tinyInteger('estadoParticipacion')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participacion');
    }
};
