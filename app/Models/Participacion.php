<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participacion extends Model
{
    use HasFactory;

    protected $fillable = ['idUsuario', 'puntajeObtenido', 'estadoParticipacion', 'usuario_id', 'trivia_id'];

    public function trivia()
    {
        return $this->belongsTo(Trivia::class, 'trivia_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
