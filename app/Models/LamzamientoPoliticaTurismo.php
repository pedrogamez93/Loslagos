<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamzamientoPoliticaTurismo extends Model
{
    use HasFactory;
    protected $table = 'lanzamiento_politica_turismos';
    protected $fillable = ['titulo', 'nombre', 'video', 'descripcion', 'nombreA', 'archivo'];
}
