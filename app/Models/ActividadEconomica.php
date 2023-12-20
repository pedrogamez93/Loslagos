<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadEconomica extends Model
{
    use HasFactory;
    protected $table = 'ActividadEconomica';
    protected $fillable = ['nombre', 'descripcion'];

    public function ActividadesEconomicaI()
    {
        return $this->hasMany(ActividadesEconomicaI::class, 'ActividadesEconomicaI_id');
    } 
}

