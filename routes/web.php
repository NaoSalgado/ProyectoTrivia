<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LoginUsuario');
});

Route::resources([
    'usuarios' => UsuarioController::class
]);