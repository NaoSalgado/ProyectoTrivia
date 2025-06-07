<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   
    <title>Proyecto Trivia - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Tu CSS personalizado -->
    <link href="{{ asset('css/loginAdmin.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/Spaceweb.png') }}">

    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
    </style>

    @stack('css')
</head>
<body>
  <div class="container-fluid min-vh-100">
    <div class="row g-0 h-100">
      <!-- Panel Izquierdo -->
      <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center position-relative form-side">
        <img src="img/DesarrolloWeb.png" alt="Logo" class="logo">
        <img src="img/spaceweb.png" alt="Spaceweb" class="login-avatar mb-1">
        <div class="login-title mt-1 mb-4">INICIAR SESIÓN</div>
        @if($errors->any())
            <div class="alert alert-danger w-100">
                {{ $errors->first() }}
            </div>
        @endif
        <form class="form-box w-100 mx-auto" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-floating mb-3 w-100">
                <input type="text" name="nombre" class="form-control" id="floatingUser" placeholder=" " required>
                <label for="floatingUser">Ingrese su usuario</label>
            </div>
            <div class="form-floating mb-3 w-100">
                <input type="password" name="contrasena" class="form-control" id="floatingPassword" placeholder=" " required>
                <label for="floatingPassword">Ingrese su contraseña</label>
            </div>
            <button type="submit" class="btn btn-login w-50 w-md-75 w-lg-50 mx-auto d-block">ACEPTAR</button>
        </form>
      </div>
      <!-- Panel Derecho -->
      <div class=" col-md-6 d-none d-md-block image-side m-0"></div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

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
          }
      });
  </script>

  @stack('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>