<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRespuestaRequest;
use App\Http\Requests\UpdateRespuestaRequest;
use Illuminate\Http\Request;
use App\Models\Respuesta;
use App\Models\Pregunta;
use Illuminate\Support\Facades\DB;
use Exception;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $respuestas = Respuesta::all();
        return view('respuestas.index', compact('respuestas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('trivias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRespuestaRequest $request)
    {
                
        try{
                    DB::beginTransaction();
                    $respuestas = Respuesta::create($request->validated());

                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                }

                return redirect()->route('respuesta.index')->with('success', 'respusta registrada');
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
     * Update the specified resource in storage.
     */
    public function update(UpdateRespuestaRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $respuesta = Respuesta::findOrFail($id);
            $respuesta->update($request->validated());
            DB::commit();
            return redirect()->route('respuestas.index')->with('success', 'Respuesta actualizada correctamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar la respuesta');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $respuesta = Respuesta::findOrFail($id);
            $respuesta->delete();
            DB::commit();
            return redirect()->route('respuestas.index')->with('success', 'Respuesta eliminada correctamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al eliminar la respuesta');
        }
    }
}
