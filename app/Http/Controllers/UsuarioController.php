<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Exception;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('Usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('LoginUsuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
{
    try {
        DB::beginTransaction();
        Usuario::create($request->validated());
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    return redirect()->route('usuarios.trivia')->with('success', '¡Suerte en la trivia!');
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
    public function edit(Usuario $usuario)
    {
        return view('Usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->update($request->validated());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario editado');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = '';
        $usuario = Usuario::find($id);
        if ($usuario->estado == 1)
        {
            Usuario::where('id',$usuario->id)
            ->delete();
            $message = 'Cliente eliminado';
        } else {
            Usuario::where('id',$usuario->id)
            ->update(['estado' => 1
            ]);
            $message = 'Cliente restaurado';
        }
        return redirect()->route('usuarios.index')->with('success', $message);
    }
}
