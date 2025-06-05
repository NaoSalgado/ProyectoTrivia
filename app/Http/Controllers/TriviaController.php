<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;
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
        $trivias = Trivia::all();
        return view('trivias.index', compact('trivias'));
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
    public function store(StoreTriviaRequest $request)
    {
        try{
            DB::beginTransaction();
            $trivia = Trivia::create($request->validated());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('trivias.index')->with('success', 'Trivia registrada');
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
        return view('trivias.edit', compact('trivia'));
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

        return redirect()->route('trivias.index')->with('success', 'Trivia actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $trivia = Trivia::findOrFail($id);
            $trivia->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Error al eliminar trivia']);
        }

        return redirect()->route('trivias.index')->with('success', 'Trivia eliminada');
    }
}
