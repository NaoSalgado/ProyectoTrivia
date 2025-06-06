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
        Schema::create('tabla_clasificacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idParticipacion')->constrained('participacion')->onDelete('cascade');
            $table->foreignId('trivia_id')->constrained('trivias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
