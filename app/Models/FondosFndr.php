<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FondosFndr extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 
        'bajada', 
        'descripcion',
        'nota',
    ];

    // Relación uno a muchos con SeccionesFndr
    public function secciones()
    {
        return $this->hasMany(SeccionesFndr::class, 'fondo_fndr_id');
    }
}