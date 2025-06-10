@extends('template')

@section('title', 'Trivia')

@push('css')
    <link href="{{ asset('/css/pyr.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
@endpush

@section('content')

<div class="container text-center">
    @if(session('acierto'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="acierto-alert">
            {{ session('acierto') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('acierto-alert');
                if(alert) alert.classList.remove('show');
            }, 1500);
        </script>
    @endif
    <div class="row principal mb-5">
      <div class="col-12">
        <div class="pregunta">{{ $pregunta->descripcion }}</div>
      </div>
    </div>
    <form id="form-respuesta" method="post" action="{{ route('trivia.responder', $trivia_id) }}">
      @csrf
      <div class="row g-3">
        @foreach ($respuestas as $respuesta)
          <div class="col-md-6">
            <button 
              type="submit" 
              name="respuesta_id" 
              value="{{ $respuesta->id }}" 
              class="btn btn-opcion mb-5 preg1"
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
    const botones = form.querySelectorAll('button[name="respuesta_id"]');

    botones.forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault(); // evitar submit inmediato

        // Deshabilitar todos los botones y quitar clases previas
        botones.forEach(b => {
          b.classList.remove('btn-correcta', 'btn-incorrecta', 'no-seleccionado');
          b.disabled = true;
        });

        // Aplicar clase según estado (1=correcto, 0=incorrecto)
        if(this.dataset.estado === '1') {
          this.classList.add('btn-correcta');
        } else {
          this.classList.add('btn-incorrecta');
        }

        // Atenuar botones no seleccionados
        botones.forEach(b => {
          if(b !== this) {
            b.classList.add('no-seleccionado');
          }
        });

        // Enviar formulario después de mostrar colores
        setTimeout(() => {
          form.submit();
        }, 800);
      });
    });
  });
</script>
@endpush
