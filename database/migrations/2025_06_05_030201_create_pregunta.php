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
        Schema::create('pregunta', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('puntaje');
            $table->tinyInteger('estado')->default(1);
            $table->unsignedBigInteger('trivia_id'); // Agrega la columna primero
            $table->timestamps();

            $table->foreign('trivia_id')->references('id')->on('trivia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregunta');
    }
};
