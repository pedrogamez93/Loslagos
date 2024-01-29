<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento_Sesion extends Model
{
    use HasFactory;

    protected $table = 'documentos_sesiones'; // Especifica el nombre de la tabla

    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }
    
}
