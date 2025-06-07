<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\RespuestaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('loginAdmin');
});

Route::post('/admin/login', [App\Http\Controllers\AdministradorController::class, 'login'])->name('admin.login');

    return view('LoginUsuario');
});

Route::get('/trivia', [TriviaController::class, 'mostrarTrivias'])->name('usuarios.trivia');



Route::resources([
    'usuarios' => UsuarioController::class,
    'administrador'=> AdministradorController::class,
    'trivias' => TriviaController::class,

]);

