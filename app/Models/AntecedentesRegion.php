<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntecedentesRegion extends Model
{
    use HasFactory;
    protected $table = 'AntecedentesRegion';
    protected $fillable = ['id','nombreseccion','subtitulo', 'descripcion', 'imagen'];
}
