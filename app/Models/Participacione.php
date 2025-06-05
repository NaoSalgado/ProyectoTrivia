<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacione extends Model
{

    protected $fillable = [
        'idUsuario',
        'PuntajeObt',
        'hora',
        'estado',
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function TablaClasificaciones()
    {
        return $this->belongsTo(TablaClasificacione::class);
    }
}
