@extends('template')

@section('title', 'Administrador')

@push('css')
    <link href="{{ asset('/css/HomeAdmin.css') }}" rel="stylesheet" />
@endpush
@section('content')

  <div class="container-fluid home-admin"> 
    <div class="row">
      
      <!-- Sidebar -->
      <div class="col-md-2 sidebar d-flex flex-column align-items-center">
        <a href="#" class="sidebar-item text-center">
          <i class="fas fa-user-gear fa-2x"></i>
          <span>Gestión de<br>Administradores</span>
        </a>
        <a href="#" class="sidebar-item text-center">
          <i class="fas fa-users fa-2x"></i>
          <span>Gestión de<br>Jugadores</span>
        </a>
        <a href="#" class="sidebar-item text-center">
          <i class="fas fa-clipboard-question fa-2x"></i>
          <span>Gestión de<br>Trivias</span>
        </a>
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