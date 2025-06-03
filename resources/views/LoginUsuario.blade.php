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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/Spaceweb.png') }}">
    @stack('css')
</head>
<body>
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
              <a href="{{ route('usuarios.create') }}"></a>
              <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf
                <div class="input-group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                  </svg>
                  <input type="text" name="nombre" class="form-control my-3 fw-bold mt-5" placeholder="Ingrese su nombre" value="{{ old('nombre') }}">
                  @if($errors->any())
                      <div class="alert alert-danger">
                          {{ $errors->first() }}
                      </div>
                  @endif
                </div>
                <button type="submit" class="btn mt-5">EMPEZAR</button>
              </form>
            </div>
          </div>
      
        </div>
      </div>

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
</body>
</html>