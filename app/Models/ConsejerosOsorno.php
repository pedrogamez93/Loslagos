<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsejerosOsorno extends Model
{
    use HasFactory;

    protected $table = 'consejeros_osornos';

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
