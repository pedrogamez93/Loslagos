<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriaSeminario extends Model
{
    protected $table = 'galerias_seminarios';

    protected $fillable = [
        'seminario_id',
        'nombre_galeria',
    ];

    // Relación con Seminario
    public function seminario()
    {
        return $this->belongsTo(Seminario::class);
    }

    // Relación con ImagenSeminario
    public function imagenes()
    {
        return $this->hasMany(ImagenSeminario::class);
    }
}