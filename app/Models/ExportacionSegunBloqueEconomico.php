<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportacionSegunBloqueEconomico extends Model
{
    use HasFactory;
    protected $table = 'ExportacionSegunBloqueEconomico';
    protected $fillable = ['id','titulo','subtitulo', 'descripcion1', 'valor1', 'actividad1', 'valoractividad1', 'actividad2', 'valoractividad2','actividad3', 'valoractividad3', 'actividad4', 'valoractividad4', 'actividad5', 'valoractividad5', 'total', 'actividad6', 'valoractividad6'];
}
