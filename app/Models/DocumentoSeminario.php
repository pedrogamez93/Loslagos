<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoSeminario extends Model
{
    protected $table = 'documento_seminarios';

    protected $fillable = [
        'seminario_id',
        'nombre_doc',
        'url_doc',
    ];

    // Relación con Seminario
    public function seminario()
    {
        return $this->belongsTo(Seminario::class);
    }
}