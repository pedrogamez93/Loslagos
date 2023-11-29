<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramitesDigitales extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tags',
        'descripcion',
        'fecha_apertura',
        'fecha_cierre',
        'icono',
        'nombre_btn',
        'url',
        'url_single',
    ];

    public function documentos()
    {
        return $this->hasMany(TramitesDigitalesDocs::class, 'tramite_id');
    }

}
