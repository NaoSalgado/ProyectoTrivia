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

@section('title','Crear Trivias')

@section('content')
<div class="container pene  mt-5" style="z-index: 1;">
    <h2 class="text-center mb-4">Crear Trivia</h2>
    <form method="POST" action="{{ route('trivias.store') }}" id="triviaForm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre de la trivia</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción de la trivia</label>
            <input type="text" name="descripcion" class="form-control" required>
        </div>

        <div id="preguntasContainer"></div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPregunta">
            Añadir Pregunta
        </button>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-success">Guardar Trivia</button>
        </div>
    </form>
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
                <input type="text" id="descripcionPregunta" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Puntaje</label>
                <input type="number" id="puntajePregunta" class="form-control" required>
            </div>
            <hr>
            <h6>Respuestas</h6>
            <div id="respuestasContainer"></div>
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
let preguntas = [];

document.getElementById('preguntaForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const descripcion = document.getElementById('descripcionPregunta').value;
    const puntaje = document.getElementById('puntajePregunta').value;
    const respuestasElems = document.querySelectorAll('.respuestaItem');

    const respuestas = Array.from(respuestasElems).map(el => ({
        descripcion: el.querySelector('.respuestaDescripcion').value,
        estado: el.querySelector('.respuestaCorrecta').checked ? 1 : 0
    }));

    const index = preguntas.length;
    preguntas.push({ descripcion, puntaje, respuestas });

    // Añadir al DOM
    const cont = document.getElementById('preguntasContainer');
    cont.insertAdjacentHTML('beforeend', `
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Pregunta: ${descripcion}</h5>
                <p class="card-text">Puntaje: ${puntaje}</p>
                <ul>
                    ${respuestas.map(r => `<li>${r.descripcion} ${r.estado ? '(Correcta)' : ''}</li>`).join('')}
                </ul>
                <input type="hidden" name="preguntas[${index}][descripcion]" value="${descripcion}">
                <input type="hidden" name="preguntas[${index}][puntaje]" value="${puntaje}">
                ${respuestas.map((r, i) => `
                    <input type="hidden" name="preguntas[${index}][respuestas][${i}][descripcion]" value="${r.descripcion}">
                    <input type="hidden" name="preguntas[${index}][respuestas][${i}][estado]" value="${r.estado}">
                `).join('')}
            </div>
        </div>
    `);

    document.getElementById('preguntaForm').reset();
    document.getElementById('respuestasContainer').innerHTML = '';
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalPregunta'));
    modal.hide();
});

function agregarRespuesta() {
    const container = document.getElementById('respuestasContainer');
    const index = container.children.length;
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
