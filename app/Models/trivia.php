<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trivia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'estadoTrivia'];
    
    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }

    public function tablaClasificacion(){
        return $this->hasOne(TablaClasificacion::class);
    }
}
