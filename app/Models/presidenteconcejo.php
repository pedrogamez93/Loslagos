<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presidenteconcejo extends Model
{
    use HasFactory;

    protected $table = 'presidente_concejos';

    protected $fillable = [
        'nombres',
        'apellidos',
        'profesion',
        'partidopolitico',
        'cargo',
        'institucion',
        'direccion',
        'telefono',
        'correo',
        'provincia',
        'comuna',
        'imagen',
    ];
}
