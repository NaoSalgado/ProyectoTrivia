@extends('templateUsuarios')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('/css/gestionTrivia.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12 col-md-6 mb-2 mb-md-0">
            <a href="{{ route('homeAdministrador') }}" class="btn btn-crear" style="background-color:#603C9D !important; color: #ffffff;">
                <i class="fa-solid fa-arrow-left"></i> Regresar al home
            </a>
        </div>
        <div class="col-12 col-md-6 text-md-end">
            <a href="{{ route('trivia.create') }}" class="btn btn-purple">Crear Trivia</a>
        </div>
    </div>

    <div class="row justify-content-center gx-5 gy-4">
        @forelse ($trivias as $trivia)
            <div class="col-lg-4 col-md-6">
                <div class="card text-white">
                    <img src="{{ asset('img/3.jpg') }}" class="card-img-top" alt="Imagen trivia">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $trivia->nombre }}</h5>
                        <div class="d-flex justify-content-around mt-3">
                            <a href="{{ route('trivias.edit', ['trivia' => $trivia->id]) }}" class="btn" style="background-color:#603C9D !important; color: #ffffff;">Editar</a>
                            <button type="button" class="btn" style="background-color:#603C9D !important; color: #ffffff;" data-bs-toggle="modal" data-bs-target="#modalTriviaEliminar-{{ $trivia->id }}">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal eliminar -->
            <div class="modal fade" id="modalTriviaEliminar-{{ $trivia->id }}" tabindex="-1" aria-labelledby="modalTriviaEliminarLabel-{{ $trivia->id }}" aria-hidden="true">
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
                                <form action="{{ route('trivias.destroy', ['trivia' => $trivia->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-custom">Sí</button>
                                </form>
                                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-white">No hay trivias disponibles.</p>
        @endforelse
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush
