<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nombre',
        'actividad',
     'division',
      'departamento',
      'cargo',
      'direccion',
      'telefono',
      'e-mail',
      'region',
      'provincia',
      'comuna',
      'foto'];
}
