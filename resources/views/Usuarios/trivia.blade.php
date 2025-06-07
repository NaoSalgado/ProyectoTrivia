@extends('template')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('/css/HomeTrivia.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="row justify-content-center gx-5 gy-4">
  @forelse ($trivias as $trivia)
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <img src="{{ asset('img/Fondo3.jpeg') }}" class="card-img-top" alt="Imagen trivia">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $trivia->nombre }}</h5>
          <form method="GET" action="{{ route('trivias.show', $trivia->id) }}">
            <button class="btn btn-play w-100">Jugar</button>
          </form>
        </div>
      </div>
    </div>
  @empty
    <p>No hay trivias disponibles.</p>
  @endforelse
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