
@extends('template')

@section('title', 'Administradores')

@push('css')
    <link href="{{ asset('css/GestionUsuario.css') }}" rel="stylesheet" />
    <style>
        @media (max-width: 767.98px) {
            .tabla-usuarios {
                padding: 0.5rem !important;
                border-radius: 10px !important;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .table th, .table td {
                font-size: 0.95rem;
                padding: 0.5rem 0.3rem;
                vertical-align: middle;
            }
            .d-flex.gap-2 {
                flex-direction: column !important;
                gap: 0.5rem !important;
            }
            .acciones-celda {
                text-align: left !important;
            }
            .acciones-botones {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                gap: 0.4rem;
                width: 100%;
            }
            .acciones-botones .btn {
                width: auto;
                min-width: 40px;
                margin: 0 !important;
            }
            .top-buttons {
                flex-direction: row !important;
                gap: 0.5rem !important;
                width: 100%;
                justify-content: flex-end;
                margin-top: 1rem;
            }
            .top-buttons .btn {
                width: auto;
                min-width: 120px;
            }
        }
        @media (min-width: 768px) {
            .acciones-botones {
                display: inline-flex !important;
                flex-direction: row !important;
                gap: 0.3rem;
            }
            .acciones-celda {
                text-align: center !important;
            }
            .top-buttons {
                flex-direction: row !important;
                gap: 0.5rem !important;
                justify-content: flex-end;
            }
        }
    </style>
@endpush

@section('content')

<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="p-4 shadow tabla-usuarios" style="background: rgba(255,255,255,0.15); max-width: 700px; width: 100%; margin: 40px auto; border-radius: 20px;">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h2 class="text-white mb-0">Gestión de Administradores</h2>
            <div class="d-flex top-buttons">
                <a href="{{ route('homeAdministrador') }}" class="btn btn-crear" style="background-color:#603C9D !important; color: #ffffff;">
                    <i class="fa-solid fa-arrow-left"></i> Regresar al home
                </a>
                <a href="{{ route('administrador.create') }}" class="btn btn-crear" style="background-color:#603C9D !important;">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                    <span class="text-white">Crear administrador</span>
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 70%;">Nombre</th>
                        <th style="width: 30%;" class="acciones-celda">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administrador as $item)
                    <tr>
                        <td>{{ $item->nombre ?? 'N/A' }}</td>
                        <td class="acciones-celda">
                            <div class="acciones-botones">
                                <form action="{{ route('administrador.edit',['administrador' => $item]) }}" method="get" class="d-inline">
                                    <button type="submit" class="btn btn-sm btn-outline-light"><i class="fa-solid fa-pen"></i></button>
                                </form>
                                <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalAdministradorEliminar-{{ $item->id }}"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal eliminar -->
                    <div class="modal fade" id="modalAdministradorEliminar-{{ $item->id }}" tabindex="-1" aria-labelledby="modalAdministradorEliminarLabel-{{ $item->id }}" aria-hidden="true">
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
                                        <form action="{{ route('administrador.destroy', ['administrador' => $item->id]) }}" method="post">
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
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush
