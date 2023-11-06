<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocGestionPersonas extends Model
{
    protected $table = 'doc_gestion_personas';
    protected $fillable = ['ruta', 'nombre'];

    public function departamento()
    {
        return $this->belongsTo(DptoGestionPersonas::class, 'departamento_id');
    }
}