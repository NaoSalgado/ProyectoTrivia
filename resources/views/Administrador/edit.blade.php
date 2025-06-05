@extends('template')

@section('title', 'Editar Administrador')
@push('css')
    <link href="{{ asset('css/crearAdmin.css') }}" rel="stylesheet" />
@endpush
@section('content')
  <div class="form-center-container">
    <div class="form-container text-center">
      <h3>Editar Administrador</h3>
      <form method="post" action="{{ route('administrador.update', ['administrador' => $administrador]) }}" >
        @method('PATCH')
        @csrf
          <div class="form-floating mb-3 w-100">
            <input type="text" name="nombre" id="nombre" class="form-control"
            value="{{old('nombre',$administrador->nombre)}}" placeholder="Ingrese el nombre de usuario" value="{{ old('nombre') }}">
            <label for="floatingUser">Ingrese su usuario</label>
          </div>
          <div class="form-floating mb-3 w-100">
            <input type="text" name="contrasena" id="contrasena" class="form-control" 
            value="{{old('contrasena',$administrador->contrasena)}}"placeholder="Ingrese una contraseña">
            <label for="floatingPassword">Ingrese su contraseña</label>
          </div>
        <div class="w-100 d-flex justify-content-end">
          <button type="submit" class="btn btn-accept">ACEPTAR</button>
        </div>
      </form>
    </div>
@endsection

