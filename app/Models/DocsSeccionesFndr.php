<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsSeccionesFndr extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_documento', 'ruta_documento', 'seccion_fndr_id' 
    ];

    // Relación muchos a uno con SeccionesFndr
    public function seccion()
    {
        return $this->belongsTo(SeccionesFndr::class, 'seccion_fndr_id');
    }
}