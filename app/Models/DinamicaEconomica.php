<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinamicaEconomica extends Model
{
    use HasFactory;
    
    protected $table = 'DinamicaEconomica';
    protected $fillable = ['id','titulo','subtitulo', 'descripcion1', 'valor1', 'descripcion2', 'valor2'];
}
