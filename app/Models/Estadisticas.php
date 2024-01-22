<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadisticas extends Model
{
    use HasFactory;
    protected $table = 'Estadisticas';
    protected $fillable = ['id','provincia','superficie','comuna', 'p_urbana_hombre', 'p_urbana_mujeres', 'p_rural_hombre', 'p_rural_mujeres','superficie_nueva'];
}
