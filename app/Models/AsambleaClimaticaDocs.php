<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsambleaClimaticaDocs extends Model
{
    use HasFactory;

    protected $table = 'asamblea_climatica_docs';

    protected $fillable = [
        'asamblea_climaticas_id',
        'nombre_documento',
        'ruta_documento',
    ];

    public function asambleaClimatica()
    {
        return $this->belongsTo(AsambleaClimatica::class, 'asamblea_climaticas_id');
    }
}
