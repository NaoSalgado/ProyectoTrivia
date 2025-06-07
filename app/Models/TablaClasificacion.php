<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TablaClasificacion extends Model
{
    use HasFactory;

    protected $fillable = ['idParticipacion', 'idTrivia'];

    public function participacion()
    {
        return $this->belongsTo(Participacion::class, 'idParticipacion');
    }

    public function trivia()
    {
        return $this->belongsTo(Trivia::class, 'idTrivia');
    }

}
