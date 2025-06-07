<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregunta extends Model
{
    use HasFactory;
    
    protected $fillable = ['trivia_id', 'descripcionPregunta', 'puntaje', 'estado'];

    public function trivia()
    {
        return $this->belongsTo(Trivia::class, 'trivia_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'pregunta_id');
    }

}
