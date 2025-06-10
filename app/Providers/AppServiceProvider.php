<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Usuario;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('components.navigationUsuario-header', function ($view) {
            $usuario = null;
            if (session('usuario_id')) {
                $usuario = Usuario::find(session('usuario_id'));
            }
            $view->with('usuario', $usuario);
        });

        View::composer('components.navigation-header', function ($view) {
            $usuario = null;
            if (session('usuario_id')) {
                $usuario = Usuario::find(session('usuario_id'));
            }
            $view->with('usuario', $usuario);
        });
    }
}
