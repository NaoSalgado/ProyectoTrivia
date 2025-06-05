@extends('template')

@section('title', 'Home Administrador')

@push('css')
    <link href="{{ asset('../public/css/css.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="p-4 shadow tabla-usuarios" style="background: rgba(255,255,255,0.15); max-width: 700px; width: 100%; margin: 40px auto; border-radius: 20px;">
        <h2 class="text-center mb-4 text-white">Gestión de Administradores</h2>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 70%;">Nombre</th>
                        <th style="width: 30%;" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $item)
                    <tr>
                        <td>{{ $item->nombre ?? 'N/A' }}</td>
                        <td class="text-center">
                            <form action="{{ route('administrador.edit',['administrador' => $item]) }}" method="get">
                                <button type="submit" class="btn btn-sm btn-outline-light me-2"><i class="fa-solid fa-pen"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalAdministradorEliminar-{{ $item->id }}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal eliminar -->
                    <div class="modal fade" id="modalAdministradorEliminar-{{ $item->id }}" tabindex="-1" aria-labelledby="modalAdministradorEliminarLabel-{{ $item->id }}" 
                    aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content custom-modal">
                            <div class="modal-body text-center">
                            <div class="icon-container">
                                <div class="circle-icon">
                                <i class="bi bi-exclamation-circle"></i>
                                </div>
                            </div>
                            <p class="modal-text">¿Desea eliminar el administrador?</p>
                            <div class="btn-group-custom">
                                <form action="{{ route('administradores.destroy', ['administrador' => $item->id]) }}" method="post">
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
                </tbody>
            </table>
        </div>
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