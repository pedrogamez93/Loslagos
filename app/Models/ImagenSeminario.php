<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagenSeminario extends Model
{
    protected $table = 'imagen_seminarios';

    protected $fillable = [
        'galeria_seminario_id',
        'nombre_imagen',
        'archivo',
    ];

    // Relación con GaleriaSeminario
    public function galeria()
    {
        return $this->belongsTo(GaleriaSeminario::class);
    }
}