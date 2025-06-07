<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Http\Requests\StoreTriviaRequest;
use App\Http\Requests\UpdateTriviaRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class TriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trivias = Trivia::with('preguntas', 'respuestas')->latest()->get();
        return view('trivia.index', compact('trivias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trivia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTriviaRequest $request)
    {
        try {
            DB::beginTransaction();

            $trivia = new Trivia();
            $trivia->nombre = $request->nombre;
            $trivia->descripcion = $request->descripcion;
            $trivia->save();
            //dd($trivia);
            //dd('pasa');
                //dd($request->preguntas);
                //dd($request->all());
            if ($request->has('preguntas')) {
                foreach ($request->preguntas as $preguntaData) {
                    $pregunta = new Pregunta();
                    $pregunta->trivia_id = $trivia->id;
                    $pregunta->descripcion = $preguntaData['descripcion'];
                    $pregunta->puntaje = $preguntaData['puntaje'];
                    $pregunta->save();
                    if (isset($preguntaData['respuestas'])) {
                        foreach ($preguntaData['respuestas'] as $respuestaData) {
                            $respuesta = new Respuesta();
                            $respuesta->pregunta_id = $pregunta->id;
                            $respuesta->descripcionRespuesta = $respuestaData['descripcion'];
                            $respuesta->estado = $respuestaData['estado'];
                            $respuesta->save();
                        }
                    }
                }
            }
            
            DB::commit();
            return redirect()->route('trivias.index')->with('success', 'Trivia creada exitosamente.');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
        ->withErrors(['error' => 'Ocurrió un error al guardar la trivia: ' . $e->getMessage()])
        ->withInput();
            //return redirect()->back()->withErrors(['error' => 'Ocurrió un error al guardar la trivia.'])->withInput();
        }
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
    public function edit(Trivia $trivia)
    {
        return view('trivia.edit', compact('trivia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTriviaRequest $request, Trivia $trivia)
    {
        try {
            DB::beginTransaction();
            $trivia->update($request->validated());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Error al actualizar trivia']);
        }

        return redirect()->route('trivia.index')->with('success', 'Trivia actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "";
        $trivia = Trivia::find($id);
        if ($trivia->estadoTriva==1){
            Trivia::where('id', $trivia->id)
            ->update([
                'estado' => 0
            ]);
            $message = 'Trivia eliminada';
        } else{
            Trivia::where('id', $trivia->id)
            ->update([
                'estado' => 1
            ]);
            $message = 'Trivia restaurada';
        }
        return redirect()->route('trivia.index')->with('success', $message);
    }

    public function mostrarTrivias()
    {
        $trivias = Trivia::where('estado', 1)->get();
        return view('usuarios.trivia', compact('trivias'));
    }
}
