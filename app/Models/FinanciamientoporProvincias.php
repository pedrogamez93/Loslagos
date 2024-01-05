<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanciamientoporProvincias extends Model
{
    use HasFactory;
    protected $table = 'FinanciamientoporProvincias';
    protected $fillable = ['titulo','periodo', 'provinciaInversionLD', 'provinciaInversionLP', 'provinciaInversionCD', 'provinciaInversionCP', 'provinciaInversionOD', 'provinciaInversionOP', 'provinciaInversionPD', 'provinciaInversionPP', 'provinciaInversionRD', 'provinciaInversionRP', 'fuente', 'descripcion'];
}
