<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\RespuestaController;
use Illuminate\Support\Facades\Route;

// Ruta raíz: LoginUsuario
Route::get('/', function () {
    return view('LoginUsuario');
});

Route::post('/admin/login', [App\Http\Controllers\AdministradorController::class, 'login'])->name('admin.login');

Route::view('/loginAdmin', 'loginAdmin' );

// Listado de trivias
Route::get('/trivia', [TriviaController::class, 'mostrarTrivias'])->name('usuarios.trivia');

// Jugar una trivia específica (esta es la que pasa $pregunta y $respuestas)
Route::get('trivia/{trivia}/jugar', [TriviaController::class, 'jugar'])->name('trivia.jugar');
Route::post('trivia/{trivia}/responder', [TriviaController::class, 'responder'])->name('trivia.responder');

// Tabla de resultados
Route::get('/tabla/resultados', [TriviaController::class, 'mostrarTablaResultados'])->name('tabla.resultados');

// Recursos RESTful
Route::resources([
    'usuarios' => UsuarioController::class,
    'administrador'=> AdministradorController::class,
    'trivias' => TriviaController::class,
]);