<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participacion;

class ParticipacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Crea o recupera una participación para un usuario y trivia.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'trivia_id' => 'required|exists:trivias,id',
        ]);

        // Crea o recupera la participación
        $participacion = Participacion::firstOrCreate([
            'usuario_id' => $request->usuario_id,
            'trivia_id' => $request->trivia_id,
        ], [
            'PuntajeObt' => 0,
            'estado' => 1,
        ]);

        // Redirige a la trivia para jugar
        return redirect()->route('trivias.show', [
            'trivia' => $request->trivia_id,
            'usuario' => $request->usuario_id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Actualiza el puntaje de una participación.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'PuntajeObt' => 'required|integer|min:0',
            'estado' => 'required|integer',
        ]);

        $participacion = Participacion::findOrFail($id);
        $participacion->update($request->only(['PuntajeObt', 'estado']));

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
