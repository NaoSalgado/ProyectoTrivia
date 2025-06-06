<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participacion extends Model
{
    use HasFactory;

    protected $fillable = ['idUsuario', 'puntajeObtenido', 'estadoParticipacion'];

    public function tablaClasificacion()
    {
        return $this->hasMany(TablaClasificacion::class, 'idTablaClasificacion');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
