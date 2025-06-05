<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\RespuestaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Trivia.HomeTrivia');
});

Route::resources([
    'usuarios' => UsuarioController::class,
    'administrador'=> AdministradorController::class,
    'trivias' => TriviaController::class,
    'respuestas' => RespuestaController::class
]);

