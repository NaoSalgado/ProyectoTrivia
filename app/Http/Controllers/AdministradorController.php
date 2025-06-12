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
        $administrador = Administradore::all();

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
        Administradore::create($request->validated());
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    return redirect()->route('administrador.index')->with('success','Administrador creado correctamente');
}

    public function edit(Administradore $administrador)
    {
        return view ('Administrador.edit', compact('administrador'));
    }

    public function update(UpdateAdministradorRequest $request, Administradore $administrador)
{

    Administradore::where('id', $administrador->id)
        ->update($request->validated());

    return redirect()->route('administrador.index')->with('success','Administrador editado');
}

    public function destroy(string $id)
    {
        $message = '';
        $Administrador = Administradore::find($id);
        if ($Administrador->estado == 1)
        {
            Administradore::where('id',$Administrador->id)
            ->delete();

            $message = 'Administrador eliminado';
        }
        else
        {
            Administradore::where('id',$Administrador->id)
            ->update([
                'estado'=> 1
            ]);
            $message = 'Administrador restaurado';
        }

        return redirect()->route('administrador.index')->with('success',$message);
    }


public function login(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'contrasena' => 'required'
    ]);

    // Usuario y contraseña fijos
    $usuarioFijo = 'DesarrolloWeb';
    $contrasenaFija = 'desarrolloW2025';

    // Si coincide con los datos fijos, permite el acceso
    if ($request->nombre === $usuarioFijo && $request->contrasena === $contrasenaFija) {
        session(['admin_id' => 0]);
        return view('Administrador.homeAdministrador');
    }

    // Si no, consulta en la base de datos
    $admin = Administradore::where('nombre', $request->nombre)
        ->where('contrasena', $request->contrasena)
        ->first();

    if ($admin) {
        session(['admin_id' => $admin->id]);
        return view('Administrador.homeAdministrador');
    } else {
        return back()->withErrors(['login' => 'Usuario o contraseña incorrectos']);
    }
}


}
