@section('title', 'Login Administrador')

@push('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/loginAdmin.css') }}" rel="stylesheet" />
@endpush
@section('content')
  <div class="container-fluid min-vh-100">
    <div class="row g-0 h-100">
      <!-- Panel Izquierdo -->
      <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center position-relative form-side">
        <img src="{{ asset('img/DesarrolloWeb.png') }}" alt="Logo" class="logo">
        <img src="{{ asset('img/Spaceweb.png') }}" alt="Spaceweb" class="login-avatar mb-1">
        <div class="login-title mt-1 mb-4">INICIAR SESIÓN</div>
        <form method="POST" action="{{ route('administradores.store') }}" class="form-box w-100 mx-auto">
          @csrf
          <div class="form-floating mb-3 w-100">
            <input type="email" name="nombre" class="form-control" id="floatingUser" placeholder=" ">
            <label for="floatingUser">Ingrese su usuario</label>
          </div>
          <div class="form-floating mb-3 w-100">
            <input type="password" name="contrasena" class="form-control" id="floatingPassword" placeholder=" ">
            <label for="floatingPassword">Ingrese su contraseña</label>
          </div>
          <button type="submit" class="btn btn-login w-50 w-md-75 w-lg-50 mx-auto d-block">ACEPTAR</button>
        </form>
      </div>
      <!-- Panel Derecho -->
      <div class=" col-md-6 d-none d-md-block image-side m-0"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Inicializador de DataTables -->
    <script>
        $(function () {
            let tabla = $('#datatablesSimple');
            if (tabla.length) {
                tabla.DataTable({
                    responsive: true,
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                    }
                });
                console.log("DataTables inicializado correctamente");
            }
        });
    </script>

    <!-- jQuery (requerido por DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    @stack('js')
