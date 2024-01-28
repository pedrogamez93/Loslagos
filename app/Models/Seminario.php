<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminario extends Model
{
    protected $table = 'seminarios';

    protected $fillable = [
        'titulo',
        'bajada',
    ];

    // Relación con DocumentoSeminario
    public function documentos()
    {
        return $this->hasMany(DocumentoSeminario::class);
    }

    // Relación con GaleriaSeminario
    public function galerias()
    {
        return $this->hasMany(GaleriaSeminario::class);
    }
}
