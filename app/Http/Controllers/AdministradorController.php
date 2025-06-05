<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Administradore;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StoreAdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administradore::all();

<<<<<<< HEAD
        return view('administrador.index', ['administrador' => $administrador]);
=======
        return view('administrador.index', compact('administradores'));
>>>>>>> fa18dd0 (PUTOSSSS ADMINISTRADORESS DE MIERDA)
    }

    public function create()
    {
        return view('administrador.create');
    }

   public function store(StoreAdministradorRequest $request)
{
    try {
        DB::beginTransaction();
        Administradore::create($request->validated());
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors('Error al crear el administrador: ' . $e->getMessage());
    }

    return redirect()->route('administrador.index')->with('success','Administrador creado correctamente');
}

<<<<<<< HEAD
    public function edit(Administrador $administrador)
=======

    public function edit(Administradore $administradore)
>>>>>>> fa18dd0 (PUTOSSSS ADMINISTRADORESS DE MIERDA)
    {
        return view ('administrador.edit', compact('administrador'));
    }

    public function update(UpdateAdministradorRequest $request, Administradore $administradore)
{

    Administradore::where('id', $administradore->id)
        ->update($request->validated());

    return redirect()->route('administrador.index')->with('success','Administrador editado');
}

    public function destroy(string $id)
    {
        $message = '';
        $administradore = Administradore::find($id);
        if ($administradore->estado == 1)
        {
            Administradore::where('id',$administradore->id)
            ->update([
                'estado' => 0,
            ]);

            $message = 'Administrador eliminado';
        }
        else
        {
            Administradore::where('id',$administradore->id)
            ->update([
                'estado'=> 1
            ]);
            $message = 'Administrador restaurado';
        }

        return redirect()->route('administrador.index')->with('success',$message);
    }




}
