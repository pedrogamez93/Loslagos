<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentonew extends Model
{

    use HasFactory;

    protected $table = 'documentosnew';

    protected $fillable = [
        'tipo_documento',
        'provincia',
        'comuna',
        'tema',
        'fecha_hora',
        'lugar',
        'numero_sesion',
        'fecha_hora_sesion',
        'portada',
        'publicacion',
        'archivo'
    ];

    public function acta()
    {
        return $this->hasOne(Acta::class);
    }
    
    public function acuerdo()
    {
        return $this->hasOne(Acuerdo::class);
    }
    
    public function resumenGastos()
{
    return $this->hasOne(ResumenGastos::class);
}
    
    public function documentoGeneral()
    {
        return $this->hasOne(DocumentoGeneral::class);
    }
    
}
