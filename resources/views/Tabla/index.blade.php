
@extends('templateUsuarios')
@section('title', 'Tabla de Resultados')

@push('css')
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endpush

@section('content')
@php
    $top3 = $resultados->take(3);
    $resto = $resultados->slice(3);
    $primero = $top3[0] ?? null;
    $segundo = $top3[1] ?? null;
    $tercero = $top3[2] ?? null;
@endphp

<div class="container text-center mt-5">
    <h1 class="text-white mb-4">Tabla de Clasificaciones</h1>

    <!-- =================== PODIO ESCRITORIO =================== -->
    <!-- Solo visible en escritorio por las clases d-none d-md-flex -->
    <div class="row justify-content-center align-items-end mt-5 d-none d-md-flex">
        <!-- Segundo lugar -->
        <div class="col-3 podium-animate">
            <p class="text-white mb-2" style="font-size: 3rem;">
                {{ $segundo ? ($segundo->usuario->nombre ?? 'Desconocido') : 'Desconocido' }}
            </p>
            <div class="bg-danger text-white py-5 d-flex flex-column justify-content-between align-items-center" style="height: 400px;">
                <h2 class="mb-0" style="font-size: 12rem;">2</h2>
                <p style="font-size: 2.5rem; margin-top: auto;">{{ $segundo->PuntajeObt ?? 0 }} pts</p>
            </div>
        </div>
        <!-- Primer lugar -->
        <div class="col-3 podium-animate">
            <p class="text-white mb-2" style="font-size: 3rem;">
                {{ $primero ? ($primero->usuario->nombre ?? 'Desconocido') : 'Desconocido' }}
            </p>
            <div class="bg-primary text-white py-5 d-flex flex-column justify-content-between align-items-center" style="height: 500px;">
                <i class="fa-solid fa-crown mb-2" style="font-size: 3rem;"></i>
                <h2 class="mb-0" style="font-size: 15rem;">1</h2>
                <p style="font-size: 2.5rem; margin-top: auto;">{{ $primero->PuntajeObt ?? 0 }} pts</p>
            </div>
        </div>
        <!-- Tercer lugar -->
        <div class="col-3 podium-animate">
            <p class="text-white mb-2" style="font-size: 3rem;">
                {{ $tercero ? ($tercero->usuario->nombre ?? 'Desconocido') : 'Desconocido' }}
            </p>
            <div class="bg-info text-white py-5 d-flex flex-column justify-content-between align-items-center" style="height: 350px;">
                <h2 class="mb-0" style="font-size: 10rem;">3</h2>
                <p style="font-size: 2.5rem; margin-top: auto;">{{ $tercero->PuntajeObt ?? 0 }} pts</p>
            </div>
        </div>
    </div>

    <!-- ================= VISTA MÓVIL ================= -->
    <!-- Solo visible en móvil por las clases d-flex d-md-none -->
    <div class="d-flex justify-content-center gap-3 mt-4 mb-4 d-flex d-md-none">
        <div class="text-center rounded-4 shadow-sm px-3 py-4 bg-danger mobile-podium delay-2" style="width: 38vw; min-width: 120px; max-width: 160px;">
            <div style="font-weight: bold; color: #fff; font-size: 2rem;">
                {{ $segundo ? ($segundo->usuario->nombre ?? 'Desconocido') : 'Desconocido' }}
            </div>
            <div class="fw-bold" style="font-size: 2.5rem; color: #fff;">2</div>
            <div class="fw-bold" style="font-size: 1.5rem; color: #fff;">{{ $segundo->PuntajeObt ?? 0 }} pts</div>
        </div>
        
        <div class="text-center rounded-4 shadow-sm px-3 py-4 position-relative bg-primary mobile-podium delay-1" style="width: 38vw; min-width: 120px; max-width: 160px;">
            <i class="fa-solid fa-crown text-warning position-absolute top-0 start-50 translate-middle-x" style="font-size: 2rem; margin-top: -22px;"></i>
            <div style="font-weight: bold; color: #fff; font-size: 2rem;">
                {{ $primero ? ($primero->usuario->nombre ?? 'Desconocido') : 'Desconocido' }}
            </div>
            <div class="fw-bold" style="font-size: 2.8rem; color: #fff;">1</div>
            <div class="fw-bold" style="font-size: 1.5rem; color: #fff;">{{ $primero->PuntajeObt ?? 0 }} pts</div>
        </div>

        <div class="text-center rounded-4 shadow-sm px-3 py-4 bg-info mobile-podium delay-3" style="width: 38vw; min-width: 120px; max-width: 160px;">
            <div style="font-weight: bold; color: #fff; font-size: 2rem;">
                {{ $tercero ? ($tercero->usuario->nombre ?? 'Desconocido') : 'Desconocido' }}
            </div>
            <div class="fw-bold" style="font-size: 2.5rem; color: #fff;">3</div>
            <div class="fw-bold" style="font-size: 1.5rem; color: #fff;">{{ $tercero->PuntajeObt ?? 0 }} pts</div>
        </div>
    </div>

    <!-- =================== TABLA GENERAL =================== -->
    <div class="container-fluid mt-5">
        <div class="table-container">
            <table class="table align-middle"  style=" text-align: left;">
                <tbody>
                    @foreach($resto as $index => $p)
                        <tr class="table-row">
                            <td class="position" style="font-size: 3rem; color: #fff;">{{ $index + 1 }}</td>
                            <td class="player-name"style="font-size: 1.5rem; color: #fff;">{{ $p->usuario->nombre ?? 'Desconocido' }}</td>
                            <td class="points"style="font-size: 1.5rem; color: #fff;"><span>{{ $p->PuntajeObt }} pts</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Confetti.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const row = document.querySelector('.row.justify-content-center.align-items-end.mt-5');
    if (row) {
        const confettiColors = [
            ['#FFD700', '#FFFACD'],
            ['#C0C0C0', '#E0E0E0'],
            ['#CD7F32', '#F4E2D8']
        ];
        const pillars = [
            row.children[1],
            row.children[0],
            row.children[2]
        ];
        pillars.forEach((pillar, i) => {
            setTimeout(() => {
                pillar.classList.add('visible');
                confetti({
                    particleCount: 80,
                    spread: 70,
                    origin: { y: 0.2 },
                    zIndex: 9999,
                    colors: confettiColors[i]
                });
            }, 300 * i);
        });
    }

    const mobilePodium = document.querySelector('.mobile-podium.delay-1');
    if (mobilePodium) {
        setTimeout(() => {
            confetti({
                particleCount: 100,
                spread: 80,
                origin: { y: 0.2 },
                zIndex: 9999
            });
        }, 400);
    }

    const tableRows = document.querySelectorAll('.table-row');
    tableRows.forEach((tr, i) => {
        setTimeout(() => {
            tr.classList.add('visible');
        }, 1000 + 200 * i);
    });
});

function launchFirework(x) {
    confetti({
        particleCount: 60,
        angle: 60,
        spread: 55,
        origin: { x: x, y: 1 },
        zIndex: 9999,
        startVelocity: 60,
        colors: ['#FFD700', '#C0C0C0', '#CD7F32', '#00e1ff', '#ff007f']
    });
    confetti({
        particleCount: 60,
        angle: 120,
        spread: 55,
        origin: { x: x, y: 1 },
        zIndex: 9999,
        startVelocity: 60,
        colors: ['#FFD700', '#C0C0C0', '#CD7F32', '#00e1ff', '#ff007f']
    });
}

function startFireworks() {
    if (window.innerWidth >= 768) {
        launchFirework(0.32);
        launchFirework(0.68);
    }
    setTimeout(startFireworks, 1800);
}

startFireworks();
</script>
@endpush