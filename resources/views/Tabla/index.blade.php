@extends('template')
@section('title', 'Tabla de Resultados')

@push('css')
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container text-center">
    <h2 class="h2">Tabla de Clasificación</h2>
    <table id="datatablesSimple" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Puesto</th>
                <th>Usuario</th>
                <th>Puntaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultados as $index => $participacion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $participacion->usuario->nombre ?? 'Desconocido' }}</td>
                    <td>{{ $participacion->PuntajeObt }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mt-3">Volver a trivias</a>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush