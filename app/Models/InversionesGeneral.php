<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InversionesGeneral extends Model
{
    use HasFactory;
    protected $table = 'InversionesGeneral';
    protected $fillable = ['id','titulo1', 'descripcion1', 'imagen1','titulo2', 'descripcion2','titulo3', 'subtitulo3','tag3', 'imagen3', 'fuente3', 'descripcion3', 'fuenteAcordeon1', 'acordeon1Descripcion', 'titulo4', 'descripcion4', 'fuenteAcordeon2', 'acordeon2Descripcion'];
}
