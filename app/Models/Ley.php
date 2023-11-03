<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ley extends Model
{
    
    protected $table = 'leygbs'; // Nombre de la tabla en la base de datos (opcional)

    protected $fillable = [
        'tipo_norma',
        'fecha_publicacion',
        'fecha_promulgacion',
        'organismo',
        'titulo',
        'tipo_version',
        'inicio_vigencia',
        'url',
        // Agrega aquí otros campos que deseas que sean llenables
    ];
}
