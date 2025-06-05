<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class trivia extends Model
{
    use HasFactory;

    public function preguntas(){
        return $this->hasMany(Pregunta::class)->withTimestamps();
    }

    public function participacion(){
        return $this->hasMany(Participacion::class)->withTimestamps();
    }
}
