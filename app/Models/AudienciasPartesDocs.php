<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudienciasPartesDocs extends Model
{
    use HasFactory;

    protected $fillable = ['audiencias_parte_id', 'nombre_doc', 'url_doc'];

    public function audiencia()
    {
        return $this->belongsTo(AudienciasPartes::class, 'audiencias_parte_id');
    }
}
