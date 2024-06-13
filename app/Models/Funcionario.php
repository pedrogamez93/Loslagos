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
      
     'division',
      'departamento',
      'cargo',
      'direccion',
      'telefono',
      'e-mail',
      'region',
      'provincia',
      'comuna',
      'foto',
      'partido_politico',
      'biografia', 
      'funciones',
      'Tfuncionario',      
      'fecha_nacimiento',  
      'lugar_nacimiento',  
      'sexo',              
    ];

      protected $appends = ['foto_url'];

      // ...
  
      public function getFotoUrlAttribute()
      {
          return asset('storage/' . $this->foto);
      }

}
