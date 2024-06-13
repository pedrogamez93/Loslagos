<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasFotografias extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruta',
        'coleccion_id',
    ];

    public function coleccion()
    {
        return $this->belongsTo(ProgramasColecciones::class, 'coleccion_id');
    }

   
    
}


