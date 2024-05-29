<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'email', 'sexo', 'direccion', 'provincia'
    , 'comuna', 'telefono', 'tipo_mensaje', 'mensaje', 'date', 'usted_escribe_como', 'actividad_oficio'
    , 'intitucion_a_enviar', 'tema_mensaje', 'proposito_objetivo', 'solicita_respuestas', 'mensaje_sugerencia_reclamo, Fecha de Envío'];

}
