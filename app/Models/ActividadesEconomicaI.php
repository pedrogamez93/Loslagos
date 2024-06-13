<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesEconomicaI extends Model
{
    use HasFactory;
    protected $table = 'ActividadesEconomicaI';
    protected $fillable = ['ActividadesEconomicaI_id','nombreA', 'hombres', 'mujeres'];

    public function ActividadEconomica(){

    return $this->belongsTo(ActividadEconomica::class, 'ActividadesEconomicaI_id');
    
    }
}
