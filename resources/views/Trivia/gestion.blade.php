@extends('template')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('/css/gest') }}" rel="stylesheet" />
@endpush

@section('content')

    <div class="main-wrapper d-flex justify-content-center align-items-center">
        <div class="text-center">
            <div class="container d-flex flex-row justify-content-center align-items-center m-1">
                <h1 class="m-5">Gestión de trivias</h1>
                <a href="{{ route('trivia.create') }}">
                    <button class="btn btn-play w-30">Crear trivia</button>
                </a>

            </div>

            <div class="row justify-content-center gx-5 gy-4">
                <!-- Tarjetas -->
                @foreach ($trivia as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Trivia {{$item->id}}</h5>
                                <div class="container d-flex flex-row justify-content-center align-items-center">
                                    <form action="{{ route('trivia.EditarTrivia', ['trivia' => $item]) }}" method="get">
                                        <button class="btn btn-play m-3">Editar</button>
                                        <button class="btn btn-play m-3" data-bs-toggle="modal"
                                            data-bs-target="#modalUsuarioEliminar-{{ $item->id }}">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal eliminar -->
                    <div class="modal fade" id="modalTriviaEliminar-{{ $item->id }}" tabindex="-1"
                        aria-labelledby="modalTriviaEliminarLabel-{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content custom-modal">
                                <div class="modal-body text-center">
                                    <div class="icon-container">
                                        <div class="circle-icon">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </div>
                                    </div>
                                    <p class="modal-text">¿Desea eliminar la trivia?</p>
                                    <div class="btn-group-custom">
                                        <form action="{{ route('trivia.destroy', ['trivia' => $item->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-custom {{ $item->estado == 1 }}">Sí</button>
                                            <button type="button" class="btn btn-custom" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@push('js')
    <!-- Inicialización de DataTables -->
    <script>
        $(document).ready(function () {
            $('#datatablesSimple').DataTable();
        });
    </script>
@endpush