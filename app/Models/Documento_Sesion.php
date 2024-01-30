<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento_Sesion extends Model
{
    use HasFactory;

    protected $table = 'documentos_sesiones';
    protected $fillable = ['sesion_id', 'nombre', 'url']; // Asegúrate de que estos sean los campos correctos

    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }
    
}
