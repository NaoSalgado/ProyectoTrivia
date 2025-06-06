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
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/Spaceweb.png') }}">

    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
    </style>

    @stack('css')
</head>
<body class="h-100 bg-dark text-white">
  <div class="container-fluid h-100 d-flex flex-column justify-content-center">
    <div class="row h-100 d-flex flex-column flex-md-row align-items-center justify-content-center text-center">
      
      <!-- Sección izquierda -->
      <div class="col-12 col-md-5 mb-4 mb-md-0 order-1 order-md-0">
        <div class="row justify-content-center">
          <div class="col-6 spaceweb">
            <img src="{{ asset('img/Spaceweb.png') }}" class="img mb-1 mt-5" alt="Logo 1">
          </div>
          <div class="col-6">
            <img src="{{ asset('img/DesarrolloWeb.png') }}" class="img mb-1 mt-5" alt="Logo 2">
          </div>
        </div>

        <div class="linea-horizontal my-3"></div>

        <h2 class="titulo fw-bold mt-3 mb-3">¡BIENVENIDOS!</h2>
        <p class="text-white px-3">
          Te saludamos desde Desarrollo Web, donde todo lo que puedas imaginar ¡lo puedes hacer!
        </p>
        <button class="btn text-white">Ver más</button>
      </div>

      <!-- Separador solo en desktop -->
      <div class="col-md-2 d-none d-md-flex justify-content-center">
        <div class="linea-centro mx-auto"></div>
      </div>

      <!-- Sección formulario -->
      <div class="col-12 col-md-5 align-self-center order-0 order-md-1">
        <div class="formulario p-4 rounded mx-3">
          <h3 class="titulo fw-bold mt-3">INGRESO</h3>
          <a href="{{ route('usuarios.create') }}"></a>
          <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf
            <div class="input-group my-3 mt-5">
              <span class="input-group-text border-0 bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle text-white" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
              </span>
              <input type="text" name="nombre" class="form-control fw-bold" placeholder="Ingrese su nombre" value="{{ old('nombre') }}">
            </div>


            @if($errors->any())
              <div class="alert alert-danger">
                  {{ $errors->first() }}
              </div>
            @endif
            <button type="submit" class="btn mt-5 text-white">EMPEZAR</button>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- Botón administrador fijo en esquina inferior derecha -->
  <div class="position-absolute bottom-0 end-0 m-3">
    <a href="{{ route('administrador.index') }}" class="btn admin">
      <i class="fa-solid fa-user text-white"></i>
      <span class="text-white">Administrador</span>
    </a>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
