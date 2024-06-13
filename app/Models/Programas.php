<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'bajada',
        'bajada_programa',
        'imagen',
        'nombrebtn', 
        'urlbtn',
        'nombreDocumento',
        'urlDocumento',
        'titulo_coleccion',    
        'ruta',    

    ];

    public function descripcion()
    {
        return $this->hasMany(ProgramasDescripciones::class, 'programa_id');
    }

    public function botones()
    {
        return $this->hasMany(Programasbtn::class, 'programa_id');
        
    }

    public function documentos()
    {
        return $this->hasMany(ProgramasDocumentos::class, 'programa_id');
    }

    public function colecciones()
{
    return $this->hasMany(ProgramasColecciones::class, 'programa_id');
}
}



