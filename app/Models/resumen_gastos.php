<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumenGastos extends Model
{
    protected $fillable = [
        'nombre',
        'portada',
        'publicacion',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
