@extends('templateUsuarios')

@section('title', 'Usuarios')

@push('css')
    <link href="{{ asset('css/EditarUsuarios.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="formulario-container d-flex justify-content-center align-items-center">
    <div class="formulario text-center p-5"  style="background: rgba(255,255,255,0.15); max-width: 700px; width: 100%; margin: 40px auto; border-radius: 20px;">
      <h3 class="mb-4">Editar Usuario</h3>
      <form action="{{ route('usuarios.update', ['usuario' => $usuario]) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="mb-3 input-group">
          <span class="input-group-text">
          <i class="bi bi-pencil-square"></i>
          </span>
          <input required type="text" name="nombre" id="nombre" class="form-control input-estilo"
          value="{{old('nombre',$usuario->nombre)}}" placeholder="Ingrese el nombre de usuario">
        </div>

        <div class="w-100 d-flex justify-content-between contenedor-boton">
          <a href="{{ route('usuarios.index') }}" class="btn btn-enviar text-white">CANCELAR</a>
            <button type="submit" class="btn btn-enviar text-white px-4">ACEPTAR</button>
        </div>
  
      </form>
    </div>
</div>
@endsection

@push('js')
@endpush