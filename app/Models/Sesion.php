<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $table = 'sesiones'; // Especifica el nombre de la tabla

    public function documentos()
    {
        return $this->hasMany(Documento_Sesion::class);
    }
}
