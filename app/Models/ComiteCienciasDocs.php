<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteCienciasDocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'comite_ciencias_id',
        'nombre_documento',
        'ruta_documento',
    ];

    public function comiteciencias()
    {
        return $this->belongsTo(ComiteCiencias::class, 'comite_ciencias_id');
    }
}
