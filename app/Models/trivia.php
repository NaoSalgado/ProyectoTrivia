<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trivia extends Model
{
    use HasFactory;

    protected $table = 'trivias'; 
    protected $fillable = ['nombre', 'descripcion', 'estado'];
    
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'trivia_id');
    }

    // Relación para respuestas a través de preguntas
    public function respuestas()
    {
        return $this->hasManyThrough(
            Respuesta::class,
            Pregunta::class,
            'trivia_id',    // Foreign key on preguntas table...
            'pregunta_id',  // Foreign key on respuestas table...
            'id',           // Local key on trivias table...
            'id'            // Local key on preguntas table...
        );
    }

    public function tablaClasificacion()
    {
        return $this->hasOne(TablaClasificacion::class);
    }
}

