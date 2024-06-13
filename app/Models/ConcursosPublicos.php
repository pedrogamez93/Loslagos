<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcursosPublicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tags',
        'descripcion',
    ];

    public function documentos()
    {
        return $this->hasMany(ConcursosPublicosDocs::class, 'concursos_publicos_id');
    }
}
