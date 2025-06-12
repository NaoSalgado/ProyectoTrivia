
@extends('template')

@section('title', 'Administrador')

@push('css')
    <link href="{{ asset('/css/HomeAdmin.css') }}" rel="stylesheet" />
    <style>
        @media (max-width: 767.98px) {
            .home-admin {
                padding: 0 !important;
            }
            .sidebar {
                flex-direction: row !important;
                width: 100vw !important;
                min-width: 0 !important;
                height: auto !important;
                position: static !important;
                justify-content: space-around !important;
                padding: 0.5rem 0;
                margin-bottom: 1rem;
            }
            .sidebar-item {
                font-size: 0.9rem;
                padding: 0.3rem 0.5rem;
            }
            .sidebar .position-absolute {
                position: static !important;
                margin: 0.5rem 0 0 0 !important;
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .content-box {
                width: 100% !important;
                margin-top: 1.5rem !important;
                padding: 1rem !important;
            }
            .col-md-2, .col-md-10 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
@endpush

@section('content')

  <div class="container-fluid home-admin"> 
    <div class="row flex-column flex-md-row">
      
      <!-- Sidebar -->
      <div class="col-md-2 sidebar d-flex flex-column align-items-center">
        <a href="{{ route('administrador.index') }}" class="sidebar-item text-center">
          <i class="fas fa-user-gear fa-2x"></i>
          <span>Gestión de<br>Administradores</span>
        </a>
        <a href="{{ route('usuarios.index') }}" class="sidebar-item text-center">
          <i class="fas fa-users fa-2x"></i>
          <span>Gestión de<br>Jugadores</span>
        </a>
        <a href="{{ route('trivia.gestion') }}" class="sidebar-item text-center">
          <i class="fas fa-clipboard-question fa-2x"></i>
          <span>Gestión de<br>Trivias</span>
        </a>

        <div class="position-absolute bottom-0 start-3 m-3">
          <a href="{{ asset('.') }}" class="btn volver">
              <i class="fa-solid fa-arrow-left text-white"></i>
              <span class="text-white">Volver</span>
          </a>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 d-flex justify-content-center align-items-start">
        <div class="content-box w-75 mt-5 text-center">
          <h2>¡Bienvenidos Administradores!</h2>
          <p>Sigan haciendo un buen trabajo como siempre.</p>
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