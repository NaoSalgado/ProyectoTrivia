<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StoreAdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;

class AdministradorController extends Controller
{
    public function index()
    {
        $administrador = Administrador::all();

        return view('administrador.index', ['administrador' => $administrador]);
    }

    public function create()
    {
        return view('administrador.create');
    }

    public function store(StoreAdministradorRequest $request)
{
    try {
        DB::beginTransaction();
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors('Error al crear el administrador');
    }

    return redirect()->route('administrador.index')->with('success','Administrador creado correctamente');
}

    public function edit(Administrador $administrador)
    {
        return view ('administrador.edit', compact('administrador'));
    }

    public function update(UpdateAdministradorRequest $request, Administrador $administrador)
{

    Administrador::where('id', $administrador->id)
        ->update($request->validated());

    return redirect()->route('administrador.index')->with('success','Administrador editado');
}

    public function destroy(string $id)
    {
        $message = '';
        $administrador = Administrador::find($id);
        if ($administrador->estado == 1)
        {
            Administrador::where('id',$administrador->id)
            ->update([
                'estado' => 0,
            ]);

            $message = 'Administrador eliminado';
        }
        else
        {
            Administrador::where('id',$administrador->id)
            ->update([
                'estado'=> 1
            ]);
            $message = 'Administrador restaurado';
        }

        return redirect()->route('administrador.index')->with('success',$message);
    }




}
