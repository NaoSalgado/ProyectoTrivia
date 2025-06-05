<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Trivia.HomeTrivia');
});

Route::resources([
    'usuarios' => UsuarioController::class
]);

