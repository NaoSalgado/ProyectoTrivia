@extends('template')

@section('title', 'Trivia')

@push('css')
    <link href="{{ asset('/css/pyr.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
@endpush

@section('content')

<div class="container text-center">

    <div class="row principal mb-5">
      <div class="col-12">
        <div class="pregunta">{{ $pregunta->descripcion }}</div>
      </div>
    </div>

    <form id="form-respuesta" method="post" action="{{ route('trivia.responder', $trivia_id) }}">
        @csrf
        <!-- Campo oculto para enviar la respuesta seleccionada -->
        <input type="hidden" name="respuesta_id" id="respuesta_id" />

        <div class="row g-3">
            @foreach ($respuestas as $respuesta)
                <div class="col-md-6">
                    <button 
                        type="button" 
                        class="btn btn-opcion mb-5 preg1" 
                        data-id="{{ $respuesta->id }}" 
                        data-estado="{{ $respuesta->estado }}"
                    >
                        <span class="icon"><i class="fas fa-globe"></i></span>
                        {{ $respuesta->descripcionRespuesta }}
                    </button>
                </div>
            @endforeach
        </div>
    </form>

    <div class="mt-3">Puntaje actual: {{ $puntaje }}</div>
</div>

@endsection

@push('js')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-respuesta');
    const inputRespuesta = document.getElementById('respuesta_id');
    const botones = form.querySelectorAll('button[data-id]');

    botones.forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();

        // Deshabilitar todos y limpiar clases previas
        botones.forEach(b => {
          b.classList.remove('btn-correcta', 'btn-incorrecta', 'no-seleccionado');
          b.disabled = true;
        });

        // Marcar el botón según estado
        if (this.dataset.estado === '1') {
          this.classList.add('btn-correcta');
        } else {
          this.classList.add('btn-incorrecta');
        }

        // Atenuar botones no seleccionados
        botones.forEach(b => {
          if (b !== this) b.classList.add('no-seleccionado');
        });

        // Cargar la respuesta en el input oculto
        inputRespuesta.value = this.dataset.id;

        // Enviar formulario
        setTimeout(() => {
          form.submit();
        }, 800);
      });
    });
  });
</script>
@endpush
