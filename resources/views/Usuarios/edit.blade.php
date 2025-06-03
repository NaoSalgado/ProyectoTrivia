@extends('template')

@section('title', 'Usuarios')

@push('css')
    <link href="{{ asset('css/EditarUsuarios.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="formulario-container d-flex justify-content-center align-items-center">
    <div class="formulario text-center p-5">
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

        <div class="contenedor-boton">
            <button type="submit" class="btn btn-enviar text-white px-4">ACEPTAR</button>
        </div>
  
      </form>
    </div>
</div>
@endsection

@push('js')
@endpush