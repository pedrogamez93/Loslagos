<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titulo_evento', 'descripcion', 'lugar', 'imagen', 'fecha_inicio', 'fecha_termino'
    ];

    protected $dates = ['fecha_inicio', 'fecha_termino'];
}
