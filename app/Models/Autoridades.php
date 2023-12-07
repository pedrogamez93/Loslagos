<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridades extends Model
{
    use HasFactory;
    protected $table = 'Autoridades';
    protected $fillable = ['id','nombre','lugar_fecha_nacimiento', 'actividad_profesion', 'partido_politico', 'cargo', 'institucion', 'direccion', 'fono', 'fax', 'Email', 'region', 'provincia', 'comuna', 'web', 'foto', 'biografia'];
    
}
