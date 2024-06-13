<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FNDR extends Model
{
    protected $table = 'FNDR';
    protected $fillable = ['id','titulo','subtitulo', 'actividad1', 'valoractividad1', 'actividad2', 'valoractividad2','actividad3', 'valoractividad3', 'actividad4', 'valoractividad4', 'actividad5', 'valoractividad5', 'total'];
}
