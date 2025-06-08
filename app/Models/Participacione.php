<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participacione extends Model
{
    use HasFactory;

    protected $fillable = ['PuntajeObt', 'estado', 'usuario_id', 'trivia_id'];

    public function trivia()
    {
        return $this->belongsTo(Trivia::class, 'trivia_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}
