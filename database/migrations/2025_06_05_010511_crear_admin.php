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
<<<<<<< HEAD
        Schema::create('Administrador', function (Blueprint $table) 
=======
        Schema::create('administradores', function (Blueprint $table) 
>>>>>>> fa18dd0 (PUTOSSSS ADMINISTRADORESS DE MIERDA)
        {
            $table->id();
            $table->string('nombre', 80);
            $table->string('contrasena', 80);
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        Schema::dropIfExists('Administrador');
=======
        Schema::dropIfExists('administradores');
>>>>>>> fa18dd0 (PUTOSSSS ADMINISTRADORESS DE MIERDA)
    }
};
