<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticaDeTurismo extends Model
{
    use HasFactory;
    protected $table = 'politica_de_turismo';
    protected $fillable = ['titulo', 'subtitulo', 'descripcion'];
}
