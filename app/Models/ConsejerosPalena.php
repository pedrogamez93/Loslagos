<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsejerosPalena extends Model
{
    use HasFactory;

    protected $table = 'consejeros_palenas';

    protected $fillable = [
        'nombres',
        'apellidos',
        'profesion',
        'partidopolitico',
        'cargo',
        'actividad',
        'institucion',
        'direccion',
        'telefono',
        'correo',
        'region',
        'provincia',
        'comuna',
        'periodosenconcejo',
        'comisiones',
        'imagen',
    ];
}
