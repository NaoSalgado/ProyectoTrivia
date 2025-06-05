@extends('template')

@section('title', 'Preguntas y Respuestas')

@push('css')
    <link href="{{ asset('../public/css/pyr.css') }}" rel="stylesheet" />
@endpush

@section('content')


<!--<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="container text-center">
    <div class="row principal mb-5">
      <div class="col-12">
        <div class="pregunta">{{ $pregunta }}</div>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-6">
        <button class="btn btn-opcion mb-5 preg2">
          <span class="icon"></span> Negro
        </button>
      </div>
    </div>
  </div>
</div>
-->

@endsection


@push('js')
<!-- Inicialización de DataTables -->
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush