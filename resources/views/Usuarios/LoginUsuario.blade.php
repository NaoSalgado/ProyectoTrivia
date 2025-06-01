@extends('template')


@section('title','login')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/login.css">
    <link rel="icon" type="image/png" href="{{ asset('img/Spaceweb.png') }}">
@endpush
@section('content')
    <div class="container-fluid my-5">
        <div class="row align-items-center text-center">
          <div class="col-md-5 mb-4 mb-md-0">
            <div class="row">
                <div class="col spaceweb">
                    <img src="{{ asset('img/Spaceweb.png') }}" class="img mb-1 mt-5" alt="Logo 1">
                </div>
                <div class="col">
                    <img src="{{ asset('img/DesarrolloWeb.png') }}" class="img mb-1 mt-5" alt="Logo 2">
                </div>
            </div>
            
            <div class="linea-horizontal"></div>
            
            <h2 class="titulo fw-bold mt-4 mb-4">¡BIENVENIDOS!</h2>
            <p class="text-white">
              Te saludamos desde Desarrollo Web, donde todo lo que puedas imaginar ¡lo puedes hacer!
            </p>
            <button class="btn">Ver más</button>
          </div>
      
          <div class="col-md-2 d-none d-md-block">
            <div class="linea-centro mx-auto"></div>
          </div>
      
          <div class="col-md-5 align-self-center">
            <div class="formulario p-4 rounded justify-content-center justify-content-between">
              <h3 class="titulo fw-bold mt-3">INGRESO</h3>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                  </svg>
                  <input type="text" name="name" class="form-control my-3 fw-bold mt-5" placeholder="Ingrese su nombre" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn mt-5">EMPEZAR</button>
              </form>
            </div>
          </div>
      
        </div>
      </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
@endpush

