<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Administrador.homeAdministrador');
});

Route::resources([
    'usuarios' => UsuarioController::class,
    'administrador'=> AdministradorController::class
]);

