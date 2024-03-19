<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionesFndr extends Model
{
    use HasFactory;

    protected $fillable = [
        'fondo_fndr_id', 'titulo_seccion',
    ];

    // Relación muchos a uno con FondosFndr
    public function fondo()
    {
        return $this->belongsTo(FondosFndr::class, 'fondo_fndr_id');
    }

    // Relación uno a muchos con DocsSeccionesFndr
    public function documentos()
    {
        return $this->hasMany(DocsSeccionesFndr::class, 'seccion_fndr_id');
    }
}