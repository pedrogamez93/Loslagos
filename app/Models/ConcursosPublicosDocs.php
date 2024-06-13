<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcursosPublicosDocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'concursos_publicos_id',
        'nombre_documento',
        'ruta_documento',
    ];

    public function concursospublicos()
    {
        return $this->belongsTo(ConcursosPublicos::class, 'concursos_publicos_id');
    }
}
