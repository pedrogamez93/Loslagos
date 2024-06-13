<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoGeneral extends Model
{
    protected $fillable = [
        'categoria',
        'titulo',
        'autor',
        'sector',
        'sub_sector',
        'financiamiento',
        'descripcion',
        'portada',
        'publicacion',
        'documentonew_id'
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
