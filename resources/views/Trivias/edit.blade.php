@extends('template')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('/css/EditarTrivia.css') }}" rel="stylesheet" />
@endpush

@section('content')

  <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid flex-wrap">
            <!-- Logo y texto "SPACEWEB" -->
            <a class="navbar-brand d-flex align-items-center text-white" href="#">
                <img src="{{ asset('img/Logo[1].png') }}" alt="Logo" width="80">
                <span class="d-none d-sm-inline" style="font-family: 'Inria Sans', sans-serif; font-size: 2rem;">SPACEWEB</span>
            </a>
            <!-- Centro: Título Modificar Trivia -->
            <div class="header-center mx-auto text-center">
                <h1 class="mb-0" style="font-family: 'Inria Sans', sans-serif; font-size: 2rem;">Modificar Trivia</h1>
            </div>
            <!-- Botón hamburguesa para móviles (no visible en este diseño) -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPlayer" aria-controls="navbarPlayer" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            <!-- Ícono y texto "Nombre de jugador" alineados a la derecha -->
            <div class="d-flex align-items-center text-white mt-2 mt-lg-0" style="font-family: 'Inria Sans', sans-serif;">
                <button class="btn p-0 me-3" style="background: none; border: none; color: white;" onclick="window.history.back()" aria-label="Regresar">
                    <i class="fa-solid fa-arrow-left" style="font-size: 28px;"></i>
                </button>
                <span style="font-size: 1.2rem;">Admin</span>
            </div>
        </div>
  </nav>

  <div class="container-trivia text-center">
    <input type="text" class="question-input" placeholder="Pregunta">

    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <button class="option-btn opcion1 w-100" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="fas fa-pen"></i> Opción 1</button>
      </div>
      <div class="col-md-6">
        <button class="option-btn opcion3 w-100" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="fas fa-pen"></i> Opción 3</button>
      </div>
      <div class="col-md-6">
        <button class="option-btn opcion2 w-100" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="fas fa-pen"></i> Opción 2</button>
      </div>
      <div class="col-md-6">
        <button class="option-btn opcion4 w-100" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="fas fa-pen"></i> Opción 4</button>
      </div>
    </div>

    <button class="confirmar-btn">Confirmar</button>
  </div>

  <!-- MODAL -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Trivia</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nombreTrivia" class="form-label">Nombre de la Trivia</label>
          <input type="text" class="form-control" id="nombreTrivia" placeholder="Ej: Trivia del espacio">
        </div>
        <div class="mb-3">
          <label for="nuevaPregunta" class="form-label">Agregar Pregunta</label>
          <div class="input-group">
            <input type="text" class="form-control" id="nuevaPregunta" placeholder="Ej: ¿Cuál es el planeta más grande?">
            <button class="btn btn-success" id="agregarPreguntaBtn" type="button">Agregar</button>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Preguntas Agregadas</label>
          <ul class="list-group" id="listaPreguntas">
            <!-- Las preguntas agregadas se insertarán aquí -->
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
@endsection


@push('js')
<!-- Inicialización de DataTables -->
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush