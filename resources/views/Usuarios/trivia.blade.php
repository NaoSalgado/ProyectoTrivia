@extends('templateUsuarios')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('/css/HomeTrivia.css') }}" rel="stylesheet" />
@endpush

@section('content')

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ asset('.') }}" class="btn btn-crear" style="background-color:#603C9D !important; color: #ffffff; position: relative;">
                <i class="fa-solid fa-arrow-left"></i> Regresar al home
            </a>
        </div>
    </div>
    <div class="row justify-content-center gx-5 gy-4">
        @forelse ($trivias as $trivia)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="{{ asset('img/3.jpg') }}" class="card-img-top" alt="Imagen trivia">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $trivia->nombre }}</h5>
                        <form method="GET" action="{{ route('trivia.jugar', ['trivia' => $trivia->id]) }}">
                            <button class="btn btn-play w-100">Jugar</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay trivias disponibles.</p>
        @endforelse
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