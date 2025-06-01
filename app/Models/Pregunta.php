<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregunta extends Model
{
    use hasFactory;
    public function trivias()
    {
        //return $this->belongsTo(Trivia::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    protected $fillable = ['descripcion'];
}
