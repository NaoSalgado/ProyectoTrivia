<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Respuesta extends Model
{
    use HasFactory;
    protected $fillable = [
        'pregunta_id',
        'descripcionRespuesta',
        'estado'
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}