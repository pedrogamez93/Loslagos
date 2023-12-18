<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteCiencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tags',
        'descripcion',
        'nota',
    ];

    public function documentos()
    {
        return $this->hasMany(ComiteCienciasDocs::class, 'comite_ciencias_id');
    }
}
