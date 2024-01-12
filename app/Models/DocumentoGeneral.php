<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentoGeneral extends Model
{

    use HasFactory;

    protected $table = 'documentos_generales';  


    protected $fillable = [
        'documentonew_id',
        'categoria',
        'titulo',
        'autor',
        'sector',
        'sub_sector',
        'financiamiento',
        'descripcion',
        'portada',
        'publicacion',
    ];

    public function documentonew()
    {
        return $this->belongsTo(Documentonew::class);
    }
}
