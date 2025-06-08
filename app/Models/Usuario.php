<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use hasFactory;
    
    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }

    protected $fillable = ['nombre'];
}