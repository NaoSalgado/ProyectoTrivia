@extends('template')

@section('title','Crear trivias')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 75vh;">
    <div class="p-4 shadow" style="background: rgba(255,255,255,0.3); max-width: 700px; width: 100%; margin: 40px auto; border-radius: 20px;">
        <h2 class="text-center mb-4 text-white">Crear Trivia</h2>
        <form method="POST" action="{{ route('trivias.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold text-white" style="font-size: 18px;">Nombre de la trivia</label>
                <input type="text" id="nombre" name="nombre" class="form-control rounded" placeholder="Ingresar el nombre de la trivia" required>
            </div>
            <div class="mb-4">
                <button type="button" class="btn text-secondary bg-white px-4 py-2 rounded">
                    Añadir pregunta
                </button>
            </div>
            <div class="text-end">
                <button type="submit" class="btn text-white px-4 py-2 rounded" style="background-color: #603C9D;">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection