@extends('template')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('../public/css/HomeTrivia.css') }}" rel="stylesheet" />
@endpush

@section('content')

  <!-- Contenido principal centrado -->
  <div class="main-wrapper d-flex justify-content-center align-items-center">
    <div class="trivia-container text-center">
      <h1 class="mb-5">Selecciona una trivia</h1>

      <div class="row justify-content-center gx-5 gy-4">
        <!-- Tarjeta 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <img src="img/descarga (2).jpeg" class="card-img-top" alt="Trivia 1">
            <div class="card-body">
              <h5 class="card-title text-center">Trivia 1</h5>
              <button class="btn btn-play w-100">Jugar</button>
            </div>
          </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <img src="img/descarga.jpeg" class="card-img-top" alt="Trivia 2">
            <div class="card-body">
              <h5 class="card-title text-center">Trivia 2</h5>
              <button class="btn btn-play w-100">Jugar</button>
            </div>
          </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <img src="img/Baixar banner com espaço sideral_ gratuitamente.jpeg" class="card-img-top" alt="Trivia 3">
            <div class="card-body">
              <h5 class="card-title text-center">Trivia 3</h5>
              <button class="btn btn-play w-100">Jugar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="social-icons">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-tiktok"></i>
      <img src="img/DesarrolloWeb.png" class="logo-footer" alt="Logo" height="50">
    </div>
  </footer>

  @endsection


@push('js')
<!-- Inicialización de DataTables -->
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush