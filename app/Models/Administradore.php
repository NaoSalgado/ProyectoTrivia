<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administradore extends Model
{
    protected $table = 'administradores';
    protected $fillable = ['nombre', 'contrasena'];
}
