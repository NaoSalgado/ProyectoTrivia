@extends('template')

@push('css')
    <link href="{{ asset('css/crearTrivia.css') }}" rel="stylesheet" />
@endpush

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('title','Editar Trivia')

@section('content')
<br>
<div class="container-fluid d-flex justify-content-center" style="min-height: 100vh;">
    <div class="p-4" style="background: rgba(255,255,255,0.3); max-width: 900px; width: 100%; margin: 40px auto; border-radius: 20px;">
        <h2 class="text-center mb-4 text-white">Editar Trivia</h2>
        <form method="POST" action="{{ route('trivias.update', $trivia->id) }}" id="triviaForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold text-white" style="font-size: 18px;">Nombre de la trivia</label>
                <input type="text" id="nombre" name="nombre" class="form-control rounded" value="{{ old('nombre', $trivia->nombre) }}" required>
            </div>
            <hr>
            <h4 class="text-white">Preguntas</h4>
            <div id="preguntasContainer">
                @foreach($trivia->preguntas as $pIndex => $pregunta)
                    <div class="card mb-3 pregunta-card" data-index="{{ $pIndex }}">
                        <div class="card-body">
                            <div class="mb-2">
                                <label class="form-label">Pregunta</label>
                                <input type="hidden" name="preguntas[{{ $pIndex }}][id]" value="{{ $pregunta->id }}">
                                <input type="text" name="preguntas[{{ $pIndex }}][descripcion]" class="form-control" value="{{ old("preguntas.$pIndex.descripcion", $pregunta->descripcion) }}" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Puntaje</label>
                                <input type="number" name="preguntas[{{ $pIndex }}][puntaje]" class="form-control" value="{{ old("preguntas.$pIndex.puntaje", $pregunta->puntaje) }}" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Respuestas</label>
                                <div class="row">
                                    @foreach($pregunta->respuestas as $rIndex => $respuesta)
                                        <div class="col-12 col-md-6 mb-2">
                                            <input type="hidden" name="preguntas[{{ $pIndex }}][respuestas][{{ $rIndex }}][id]" value="{{ $respuesta->id }}">
                                            <input type="text" name="preguntas[{{ $pIndex }}][respuestas][{{ $rIndex }}][descripcion]" class="form-control mb-1" value="{{ old("preguntas.$pIndex.respuestas.$rIndex.descripcion", $respuesta->descripcionRespuesta) }}" required>
                                            <div class="form-check">
                                                <!-- Hidden para enviar 0 si el checkbox no está marcado -->
                                                <input type="hidden" name="preguntas[{{ $pIndex }}][respuestas][{{ $rIndex }}][estado]" value="0">
                                                <input class="form-check-input" type="checkbox" name="preguntas[{{ $pIndex }}][respuestas][{{ $rIndex }}][estado]" value="1" {{ old("preguntas.$pIndex.respuestas.$rIndex.estado", $respuesta->estado) ? 'checked' : '' }}>
                                                <label class="form-check-label">¿Es correcta?</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Aquí podrías agregar botón para eliminar pregunta/respuesta si lo deseas -->
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                <button type="button" class="btn text-secondary bg-white px-4 py-2 rounded" data-bs-toggle="modal" data-bs-target="#modalPregunta">
                    <i class="fa-solid fa-plus" style="color: #000000;"></i>
                    Añadir pregunta
                </button>
            </div>
            <div class="text-end">
                <button type="submit" class="btn text-white px-4 py-2 rounded" style="background-color: #603C9D;">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Pregunta -->
<div class="modal fade" id="modalPregunta" tabindex="-1" aria-labelledby="modalPreguntaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="preguntaForm">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Pregunta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Descripción de la pregunta</label>
                <input type="text" id="descripcionPregunta" class="form-control" >
            </div>
            <div class="mb-3">
                <label>Puntaje</label>
                <input type="number" id="puntajePregunta" class="form-control" required>
            </div>
            <hr>
            <h6>Respuestas</h6>
            <div id="respuestasContainerModal"></div>
            <button type="button" class="btn btn-outline-primary" onclick="agregarRespuesta()">+ Añadir Respuesta</button>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Agregar Pregunta</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById('preguntaForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const descripcion = document.getElementById('descripcionPregunta').value;
    const puntaje = document.getElementById('puntajePregunta').value;
    const respuestasElems = document.querySelectorAll('#respuestasContainerModal .respuestaItem');

    const respuestas = Array.from(respuestasElems).map(el => ({
        descripcion: el.querySelector('.respuestaDescripcion').value,
        estado: el.querySelector('.respuestaCorrecta').checked ? 1 : 0
    }));

    const index = document.querySelectorAll('#preguntasContainer .pregunta-card').length;

    // Añadir al DOM
    const cont = document.getElementById('preguntasContainer');
    cont.insertAdjacentHTML('beforeend', `
        <div class="card mb-3 pregunta-card" data-index="${index}">
            <div class="card-body">
                <div class="mb-2">
                    <label class="form-label">Pregunta</label>
                    <input type="text" name="preguntas[${index}][descripcion]" class="form-control" value="${descripcion}" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Puntaje</label>
                    <input type="number" name="preguntas[${index}][puntaje]" class="form-control" value="${puntaje}" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Respuestas</label>
                    <div class="row">
                        ${respuestas.map((r, i) => `
                            <div class="col-12 col-md-6 mb-2">
                                <input type="text" name="preguntas[${index}][respuestas][${i}][descripcion]" class="form-control mb-1" value="${r.descripcion}" required>
                                <div class="form-check">
                                    <input type="hidden" name="preguntas[${index}][respuestas][${i}][estado]" value="0">
                                    <input class="form-check-input" type="checkbox" name="preguntas[${index}][respuestas][${i}][estado]" value="1" ${r.estado ? 'checked' : ''}>
                                    <label class="form-check-label">¿Es correcta?</label>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        </div>
    `);

    document.getElementById('preguntaForm').reset();
    document.getElementById('respuestasContainerModal').innerHTML = '';
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalPregunta'));
    modal.hide();
});

function agregarRespuesta() {
    const container = document.getElementById('respuestasContainerModal');
    container.insertAdjacentHTML('beforeend', `
        <div class="respuestaItem mb-2">
            <input type="text" class="form-control respuestaDescripcion mb-1" placeholder="Respuesta" required>
            <div class="form-check">
                <input class="form-check-input respuestaCorrecta" type="checkbox">
                <label class="form-check-label">¿Es correcta?</label>
            </div>
        </div>
    `);
}
</script>
@endsection