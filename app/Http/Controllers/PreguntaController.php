<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreguntaRequest;
use App\Http\Requests\UpdatePreguntaRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Exception;

use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preguntas = Pregunta::with('respuestas')->get();

        return view('preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreguntaRequest $request)
    {
        try{
            DB::beginTransaction();
            $pregunta = Pregunta::create($request->validated());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('preguntas.index')->with('success', 'Pregunta registrada');
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
    public function edit(Pregunta $pregunta)
    {
        return view('preguntas.edit', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreguntaRequest $request, Pregunta $pregunta)
    {
        try {
            DB::beginTransaction();
            $pregunta->update($request->validated());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('preguntas.index')->with('success', 'Pregunta actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $pregunta = Pregunta::findOrFail($id);
            $pregunta->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('preguntas.index')->with('error', 'Error al eliminar la pregunta');
        }
    }
}
